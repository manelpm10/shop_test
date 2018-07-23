<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\OrderId;

final class OrderIdStub
{
    public static function create(string $orderId): OrderId
    {
        return new OrderId($orderId);
    }

    public static function random(): OrderId
    {
        return self::create(AbstractStubCreator::faker()->unique()->uuid());
    }
}
