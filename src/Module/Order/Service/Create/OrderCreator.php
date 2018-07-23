<?php

declare(strict_types=1);

namespace Module\Order\Service\Create;

use Module\Order\Contract\Response\OrderCreatedResponse;
use Module\Order\Domain\Order;
use Module\Order\Domain\OrderStatus;
use Module\Order\Domain\OrderTotalAmount;
use Module\Order\Model\OrderRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\OrderId;
use Module\Shared\Domain\PaymentId;

final class OrderCreator
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        OrderId $id,
        CartId $cartId,
        OrderTotalAmount $totalAmount,
        OrderStatus $status,
        PaymentId $paymentId
    ) : OrderCreatedResponse
    {
        $order = Order::create($id, $cartId, $totalAmount, $status, $paymentId);
        $this->repository->save($order);

        return new OrderCreatedResponse($order->id()->__toString());
    }
}