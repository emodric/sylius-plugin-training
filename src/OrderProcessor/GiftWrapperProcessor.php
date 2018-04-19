<?php

declare(strict_types=1);

namespace Acme\SyliusExamplePlugin\OrderProcessor;

use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class GiftWrapperProcessor implements OrderProcessorInterface
{
    /** @var AdjustmentFactoryInterface */
    private $adjustmentFactory;

    public function __construct(AdjustmentFactoryInterface $adjustmentFactory)
    {
        $this->adjustmentFactory = $adjustmentFactory;
    }

    public function process(OrderInterface $order): void
    {
        /** @var AdjustmentInterface $adjustment */
        $adjustment = $this->adjustmentFactory->createNew();

        $adjustment->setAmount(1000);
        $adjustment->setType('gift_wrapping');

        $order->addAdjustment($adjustment);
    }
}
