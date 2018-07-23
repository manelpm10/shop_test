<?php

declare(strict_types=1);

namespace Module\Order\Tests\Behaviour\Create;

use Module\Order\Service\Create\OrderCreator;
use Module\Order\Tests\Infrastructure\OrderUnitTestCase;
use Module\Order\Tests\Stub\Domain\OrderStub;
use Module\Order\Tests\Stub\Response\OrderCreatedResponseStub;

final class OrderCreatorTest extends OrderUnitTestCase
{
    private $orderCreator;

    public function setUp()
    {
        $this->orderCreator = new OrderCreator($this->getOrderRepository());
    }

    /**
     * @test
     */
    public function it_should_save_an_order()
    {
        $order = OrderStub::random();
        $orderCreatedResponse = OrderCreatedResponseStub::create($order->id()->__toString());

        $this->shouldSaveOrder($order);

        $this->assertEquals(
            $orderCreatedResponse,
            $this->orderCreator->__invoke(
                $order->id(),
                $order->cartId(),
                $order->totalAmount(),
                $order->status(),
                $order->paymentId()
            )
        );
    }
}