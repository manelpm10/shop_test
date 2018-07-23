<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Response;

use Module\Cart\Contract\Response\CartItemCreatedResponse;
use Module\Shared\Tests\Stub\CartLineIdStub;

final class CartItemCreatedResponseStub
{
    public static function create(string $cartLineId): CartItemCreatedResponse
    {
        return new CartItemCreatedResponse($cartLineId);
    }

    public static function random(): CartItemCreatedResponse
    {
        return self::create(
            CartLineIdStub::random()->__toString()
        );
    }
}