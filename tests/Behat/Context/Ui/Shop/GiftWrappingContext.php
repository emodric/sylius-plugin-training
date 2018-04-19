<?php

namespace Tests\Acme\SyliusExamplePlugin\Behat\Context\Ui\Shop;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Tests\Acme\SyliusExamplePlugin\Behat\Page\Shop\SummaryPage;

final class GiftWrappingContext implements Context
{
    /** @var SummaryPage */
    private $summaryPage;

    public function __construct(SummaryPage $summaryPage)
    {
        $this->summaryPage = $summaryPage;
    }

    /**
     * @When I request to pack my order as a gift
     */
    public function iRequestToPackMyOrderAsAGift(): void
    {
        $this->summaryPage->giftWrap();
    }
}
