<?php

namespace Acme\SyliusExamplePlugin\OrderProcessor;

use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class GiftWrapperAdjustmentClearerProcessor implements OrderProcessorInterface
{
    public function process(OrderInterface $order): void
    {
        $order->removeAdjustments('gift_wrapping');
    }
}
