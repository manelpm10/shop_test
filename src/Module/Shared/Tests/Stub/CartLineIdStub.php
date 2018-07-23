<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\CartLineId;

final class CartLineIdStub
{
    public static function create(string $cartLineId): CartLineId
    {
        return new CartLineId($cartLineId);
    }

    public static function random(): CartLineId
    {
        return self::create(AbstractStubCreator::faker()->unique()->uuid());
    }
}
