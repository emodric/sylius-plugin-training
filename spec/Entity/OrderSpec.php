<?php

namespace spec\Acme\SyliusExamplePlugin\Entity;

use Acme\SyliusExamplePlugin\Entity\Order;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Order::class);
    }

    function it_is_a_core_order(): void
    {
        $this->shouldHaveType(\Sylius\Component\Core\Model\Order::class);
    }

    function it_has_gift_wrap_field(): void
    {
        $this->setGiftWrap(true);
        $this->isGiftWrap()->shouldReturn(true);
    }

    function it_is_not_gift_wrapped_by_default(): void
    {
        $this->isGiftWrap()->shouldReturn(false);
    }
}
