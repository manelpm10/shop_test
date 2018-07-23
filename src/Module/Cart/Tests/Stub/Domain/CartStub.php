<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Domain;

use Module\Cart\Domain\Cart;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CustomerId;
use Module\Shared\Tests\Stub\CartIdStub;
use Module\Shared\Tests\Stub\CustomerIdStub;

final class CartStub
{
    public static function create(CartId $cartId, CustomerId $customerId): Cart
    {
        return new Cart($cartId, $customerId);
    }

    public static function random(): Cart
    {
        return self::create(
            CartIdStub::random(),
            CustomerIdStub::random()
        );
    }
}