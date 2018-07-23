<?php

declare(strict_types=1);

namespace Module\Order\Domain;

use ValueObjects\String\StringLiteral;

// TODO Implement ENUM value object.
class OrderStatus extends StringLiteral
{
    const PENDING = 'pending';
    const SHIPPING = 'shipping';
    const DELIVERED = 'delivered';
}