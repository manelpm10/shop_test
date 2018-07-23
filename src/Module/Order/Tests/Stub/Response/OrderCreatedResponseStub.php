<?php

declare(strict_types=1);

namespace Module\Order\Tests\Stub\Response;

use Module\Order\Contract\Response\OrderCreatedResponse;
use Module\Shared\Tests\Stub\OrderIdStub;

final class OrderCreatedResponseStub
{
    public static function create(string $orderId): OrderCreatedResponse
    {
        return new OrderCreatedResponse($orderId);
    }

    public static function random(): OrderCreatedResponse
    {
        return self::create(
            OrderIdStub::random()->__toString()
        );
    }
}