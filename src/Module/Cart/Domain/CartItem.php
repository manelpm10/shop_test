<?php

declare(strict_types=1);

namespace Module\Cart\Domain;

use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;
use Module\Shared\Domain\SellerProductId;

final class CartItem
{
    private $id;
    private $cartId;
    private $sellerProductId;
    private $quantity;

    public function __construct(
        CartItemId $id,
        CartId $cartId,
        SellerProductId $sellerProductId,
        CartItemQuantity $quantity
    )
    {
        $this->id = $id;
        $this->cartId = $cartId;
        $this->sellerProductId = $sellerProductId;
        $this->quantity = $quantity;
    }

    public static function create(
        CartItemId $id,
        CartId $cartId,
        SellerProductId $sellerProductId,
        CartItemQuantity $quantity
    ): CartItem
    {
        // TODO register new cart item created event.

        return new self($id, $cartId, $sellerProductId, $quantity);
    }

    public function id(): CartItemId
    {
        return $this->id;
    }

    public function cartId(): CartId
    {
        return $this->cartId;
    }

    public function sellerProductId(): SellerProductId
    {
        return $this->sellerProductId;
    }

    public function quantity(): CartItemQuantity
    {
        return $this->quantity;
    }

    public function updateQuantity(CartItemQuantity $newQuantity)
    {
        $this->quantity = $newQuantity;
    }
}
