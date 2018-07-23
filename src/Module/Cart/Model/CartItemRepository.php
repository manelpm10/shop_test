<?php

namespace Module\Cart\Model;

use Module\Cart\Domain\CartItem;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;

interface CartItemRepository
{
    public function find(CartItemId $id): ?CartItem;
    public function save(CartItem $cartItem): void;
    public function delete(CartItem $cartItem): void;
    public function deleteByCartId(CartId $cartId): void;
}