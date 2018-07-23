<?php

declare(strict_types=1);

namespace Module\Order\Domain;

use Module\Shared\Domain\CartId;
use Module\Shared\Domain\OrderId;
use Module\Shared\Domain\PaymentId;

final class Order
{
    private $id;
    private $cartId;
    private $totalAmount;
    private $status;
    private $paymentId;

    public function __construct(
        OrderId $id,
        CartId $cartId,
        OrderTotalAmount $totalAmount,
        OrderStatus $status,
        PaymentId $paymentId
    )
    {
        $this->id = $id;
        $this->cartId = $cartId;
        $this->totalAmount = $totalAmount;
        $this->status = $status;
        $this->paymentId = $paymentId;
    }

    public static function create(
        OrderId $id,
        CartId $cartId,
        OrderTotalAmount $totalAmount,
        OrderStatus $status,
        PaymentId $paymentId
    ): Order
    {
        // TODO register new order created event.

        return new self($id, $cartId, $totalAmount, $status, $paymentId);
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function cartId(): CartId
    {
        return $this->cartId;
    }

    public function totalAmount(): OrderTotalAmount
    {
        return $this->totalAmount;
    }

    public function status(): OrderStatus
    {
        return $this->status;
    }

    public function paymentId(): PaymentId
    {
        return $this->paymentId;
    }
}
