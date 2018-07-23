<?php

declare(strict_types=1);

namespace Module\Order\Tests\Stub\Domain;

use Module\Order\Domain\Order;
use Module\Order\Domain\OrderStatus;
use Module\Order\Domain\OrderTotalAmount;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\OrderId;
use Module\Shared\Domain\PaymentId;
use Module\Shared\Tests\Stub\CartIdStub;
use Module\Shared\Tests\Stub\OrderIdStub;
use Module\Shared\Tests\Stub\PaymentIdStub;

final class OrderStub
{
    public static function create(
        OrderId $id,
        CartId $cartId,
        OrderTotalAmount $totalAmount,
        OrderStatus $status,
        PaymentId $paymentId
    ): Order
    {
        return new Order($id, $cartId, $totalAmount, $status, $paymentId);
    }

    public static function random(): Order
    {
        return self::create(
            OrderIdStub::random(),
            CartIdStub::random(),
            OrderTotalAmountStub::random(),
            OrderStatusStub::random(),
            PaymentIdStub::random()
        );

    }
}