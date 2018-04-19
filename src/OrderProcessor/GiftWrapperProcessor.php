<?php

declare(strict_types=1);

namespace Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\Entity\Order;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class GiftWrapperProcessor implements OrderProcessorInterface
{
    /** @var AdjustmentFactoryInterface */
    private $adjustmentFactory;

    private const GIFT_WRAPPING = 'gift_wrapping';

    public function __construct(AdjustmentFactoryInterface $adjustmentFactory)
    {
        $this->adjustmentFactory = $adjustmentFactory;
    }

    public function process(OrderInterface $order): void
    {
        if (!$order instanceof Order) {
            return;
        }

        $order->removeAdjustments(self::GIFT_WRAPPING);

        if (!$order->isGiftWrap()) {
            return;
        }

        /** @var AdjustmentInterface $adjustment */
        $adjustment = $this->adjustmentFactory->createNew();

        $adjustment->setAmount(1000);
        $adjustment->setType(self::GIFT_WRAPPING);

        $order->addAdjustment($adjustment);
    }
}
