<?php

namespace Tests\Acme\SyliusExamplePlugin\Behat\Page\Shop;

use Sylius\Behat\Page\Shop\Cart\SummaryPage as BaseSummaryPage;

final class SummaryPage extends BaseSummaryPage
{
    public function giftWrap(): void
    {
        $this->getElement('gift_wrapped')->check();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'gift_wrapped' => '#sylius-gift-wrapped',
        ]);
    }
}
