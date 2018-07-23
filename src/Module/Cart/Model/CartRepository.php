<?php

namespace Module\Cart\Model;

use Module\Cart\Domain\Cart;

interface CartRepository
{
    public function save(Cart $cart): void;
}