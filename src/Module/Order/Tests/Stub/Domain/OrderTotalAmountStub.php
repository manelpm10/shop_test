<?php

declare(strict_types=1);

namespace Module\Order\Tests\Stub\Domain;

use Module\Order\Domain\OrderTotalAmount;
use Module\Shared\Tests\Stub\AbstractStubCreator;

final class OrderTotalAmountStub
{
    public static function create(float $orderStatus): OrderTotalAmount
    {
        return new OrderTotalAmount($orderStatus);
    }

    public static function random(): OrderTotalAmount
    {
        return self::create(AbstractStubCreator::faker()->unique()->randomFloat(2, 0, 999));
    }
}
