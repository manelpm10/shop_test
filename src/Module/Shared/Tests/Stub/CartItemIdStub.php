<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\CartItemId;

final class CartItemIdStub
{
    public static function create(string $cartItemId): CartItemId
    {
        return new CartItemId($cartItemId);
    }

    public static function random(): CartItemId
    {
        return self::create(AbstractStubCreator::faker()->unique()->uuid());
    }
}
