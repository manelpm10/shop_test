<?php

declare(strict_types=1);

namespace Module\Order\Infrastructure\Persistence\Doctrine;

use AppBundle\Entity\Orders;
use Module\Order\Domain\Order;
use Module\Order\Model\OrderRepository;
use Module\Shared\Infrastructure\Persistence\Doctrine\Repository;

class OrderRepositoryMySql extends Repository implements OrderRepository
{
    protected function getRepositoryName(): string
    {
        return Orders::class;
    }

    public function save(Order $order): void
    {
        $orderEntity = Orders::create(
            $order->id()->__toString(),
            $order->cartId()->__toString(),
            $order->totalAmount()->value(),
            $order->status()->value(),
            $order->paymentId()->value()
        );

        $this->persist($orderEntity);
    }
}
