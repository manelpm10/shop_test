<?php

namespace Module\Order\Model;

use Module\Order\Domain\Order;

interface OrderRepository
{
    public function save(Order $order): void;
}