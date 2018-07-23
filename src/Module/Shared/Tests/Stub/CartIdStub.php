<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\CartId;

final class CartIdStub
{
    public static function create(string $cartId): CartId
    {
        return new CartId($cartId);
    }

    public static function random(): CartId
    {
        return self::create(AbstractStubCreator::faker()->unique()->uuid());
    }
}
