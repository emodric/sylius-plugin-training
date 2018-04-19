<?php

namespace spec\Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\OrderProcessor\GiftWrapperProcessor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Order\Factory\AdjustmentFactoryInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

class GiftWrapperProcessorSpec extends ObjectBehavior
{
    function let(AdjustmentFactoryInterface $adjustmentFactory)
    {
        $this->beConstructedWith($adjustmentFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GiftWrapperProcessor::class);
    }

    function it_is_order_processor(): void
    {
        $this->shouldImplement(OrderProcessorInterface::class);
    }

    function it_adds_a_ten_dollar_to_order_total_if_gift_wrapping_requested(
        OrderInterface $order,
        AdjustmentFactoryInterface $adjustmentFactory,
        AdjustmentInterface $adjustment
    ): void {
        $adjustmentFactory->createNew()->willReturn($adjustment);

        $adjustment->setAmount(1000)->shouldBeCalled();
        $adjustment->setType('gift_wrapping')->shouldBeCalled();

        $order->addAdjustment($adjustment)->shouldBeCalled();

        $this->process($order);
    }
}
