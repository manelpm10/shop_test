<?php

namespace Module\Order\Tests\Infrastructure;

use Module\Order\Domain\Order;
use Module\Order\Model\OrderRepository;

/**
 * Class OrderUnitTestCase.
 */
class OrderUnitTestCase extends \PHPUnit_Framework_TestCase
{
    private $orderRepository;

    protected function getOrderRepository(): \PHPUnit_Framework_MockObject_MockObject
    {
        return $this->orderRepository = $this->orderRepository ?: $this->createMock(
            OrderRepository::class
        );
    }

    protected function shouldSaveOrder(Order $order): void
    {
        $this->getOrderRepository()
            ->expects($this->once())
            ->method('save')
            ->with($order);
    }
}
