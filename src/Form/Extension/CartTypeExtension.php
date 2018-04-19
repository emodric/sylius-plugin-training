<?php

namespace Acme\SyliusExamplePlugin\Form\Extension;

use Sylius\Bundle\OrderBundle\Form\Type\CartType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

final class CartTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('giftWrap', CheckboxType::class);
    }

    public function getExtendedType(): string
    {
        return CartType::class;
    }
}
