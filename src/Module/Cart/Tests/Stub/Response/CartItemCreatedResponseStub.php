<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Response;

use Module\Cart\Contract\Response\CartItemCreatedResponse;
use Module\Shared\Tests\Stub\CartItemIdStub;

final class CartItemCreatedResponseStub
{
    public static function create(string $cartItemId): CartItemCreatedResponse
    {
        return new CartItemCreatedResponse($cartItemId);
    }

    public static function random(): CartItemCreatedResponse
    {
        return self::create(
            CartItemIdStub::random()->__toString()
        );
    }
}