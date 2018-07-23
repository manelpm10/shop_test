<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Domain;

use Module\Cart\Domain\CartItem;
use Module\Cart\Domain\CartItemQuantity;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartLineId;
use Module\Shared\Domain\SellerProductId;
use Module\Shared\Tests\Stub\CartIdStub;
use Module\Shared\Tests\Stub\CartLineIdStub;
use Module\Shared\Tests\Stub\SellerProductIdStub;

final class CartItemStub
{
    public static function create(
        CartLineId $cartLineId,
        CartId $cartId,
        SellerProductId $sellerProductId,
        CartItemQuantity $quantity
    ): CartItem
    {
        return new CartItem($cartLineId, $cartId, $sellerProductId, $quantity);
    }

    public static function random(): CartItem
    {
        return self::create(
            CartLineIdStub::random(),
            CartIdStub::random(),
            SellerProductIdStub::random(),
            CartItemQuantityStub::random()
        );
    }
}