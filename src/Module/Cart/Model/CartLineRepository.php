<?php

namespace Module\Cart\Model;

use Module\Cart\Domain\CartItem;

interface CartLineRepository
{
    public function save(CartItem $cartItem): void;
}