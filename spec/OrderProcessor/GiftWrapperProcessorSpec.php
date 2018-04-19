<?php

declare(strict_types=1);

namespace spec\Acme\SyliusExamplePlugin\OrderProcessor;

use Acme\SyliusExamplePlugin\Entity\Order;
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
        Order $order,
        AdjustmentFactoryInterface $adjustmentFactory,
        AdjustmentInterface $adjustment
    ): void {
        $adjustmentFactory->createNew()->willReturn($adjustment);

        $order->isGiftWrap()->willReturn(true);

        $adjustment->setAmount(1000)->shouldBeCalled();
        $adjustment->setType('gift_wrapping')->shouldBeCalled();

        $order->addAdjustment($adjustment)->shouldBeCalled();

        $this->process($order);
    }

    function it_does_not_add_a_additional_fee_by_default(Order $order): void
    {
        $order->isGiftWrap()->willReturn(false);

        $order->addAdjustment(Argument::any())->shouldNotBeCalled();

        $this->process($order);
    }

    function it_skippes_processor_if_order_is_not_an_order_from_this_plugin(OrderInterface $order)
    {
        $order->addAdjustment(Argument::any())->shouldNotBeCalled();

        $this->process($order);
    }
}
