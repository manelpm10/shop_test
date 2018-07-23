<?php

declare(strict_types=1);

namespace Module\Order\Tests\Stub\Domain;

use Module\Order\Domain\OrderStatus;
use Module\Shared\Tests\Stub\AbstractStubCreator;

final class OrderStatusStub
{
    public static function create(string $orderStatus): OrderStatus
    {
        return new OrderStatus($orderStatus);
    }

    public static function random(): OrderStatus
    {
        return self::create(AbstractStubCreator::faker()->unique()->randomElement(['pending', 'shipping', 'delivered']));
    }
}
