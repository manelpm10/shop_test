<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Stub\Domain;

use Module\Cart\Domain\CartItem;
use Module\Cart\Domain\CartItemQuantity;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;
use Module\Shared\Domain\SellerProductId;
use Module\Shared\Tests\Stub\CartIdStub;
use Module\Shared\Tests\Stub\CartItemIdStub;
use Module\Shared\Tests\Stub\SellerProductIdStub;

final class CartItemStub
{
    public static function create(
        CartItemId $cartItemId,
        CartId $cartId,
        SellerProductId $sellerProductId,
        CartItemQuantity $quantity
    ): CartItem
    {
        return new CartItem($cartItemId, $cartId, $sellerProductId, $quantity);
    }

    public static function random(): CartItem
    {
        return self::create(
            CartItemIdStub::random(),
            CartIdStub::random(),
            SellerProductIdStub::random(),
            CartItemQuantityStub::random()
        );
    }
}