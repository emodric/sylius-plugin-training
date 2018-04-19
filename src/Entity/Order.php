<?php

namespace Acme\SyliusExamplePlugin\Entity;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
    /** @var bool */
    private $giftWrap = false;

    public function isGiftWrap(): bool
    {
        return $this->giftWrap;
    }

    public function setGiftWrap(bool $giftWrap): void
    {
        $this->giftWrap = $giftWrap;
    }
}
