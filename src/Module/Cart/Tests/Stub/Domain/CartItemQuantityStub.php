<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Domain;

use Module\Cart\Domain\CartItemQuantity;
use Module\Shared\Tests\Stub\AbstractStubCreator;

final class CartItemQuantityStub
{
    public static function create(int $cartItemQuantity): CartItemQuantity
    {
        return new CartItemQuantity($cartItemQuantity);
    }

    public static function random(): CartItemQuantity
    {
        return self::create(AbstractStubCreator::faker()->unique()->numberBetween(1, 10));
    }
}
