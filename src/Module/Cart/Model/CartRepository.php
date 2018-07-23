<?php

namespace Module\Cart\Model;

use Module\Cart\Domain\Cart;
use Module\Shared\Domain\CartId;

interface CartRepository
{
    public function find(CartId $cartId): ?Cart;
    public function save(Cart $cart): void;
    public function delete(Cart $cart): void;
}