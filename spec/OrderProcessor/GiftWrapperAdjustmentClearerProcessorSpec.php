<?php

namespace spec\Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\OrderProcessor\GiftWrapperAdjustmentClearerProcessor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

class GiftWrapperAdjustmentClearerProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GiftWrapperAdjustmentClearerProcessor::class);
    }

    function it_is_an_order_processor()
    {
        $this->shouldImplement(OrderProcessorInterface::class);
    }

    function it_clears_gift_wrapped_adjustments(OrderInterface $order)
    {
        $order->removeAdjustments('gift_wrapping')->shouldBeCalled();

        $this->process($order);
    }
}
