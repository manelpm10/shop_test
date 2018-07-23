<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Response;

use Module\Cart\Contract\Response\CartCreatedResponse;
use Module\Shared\Tests\Stub\CartIdStub;

final class CartCreatedResponseStub
{
    public static function create(string $cartId): CartCreatedResponse
    {
        return new CartCreatedResponse($cartId);
    }

    public static function random(): CartCreatedResponse
    {
        return self::create(
            CartIdStub::random()->__toString()
        );
    }
}