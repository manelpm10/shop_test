<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Behaviour\Create;

use Module\Cart\Service\Create\CartCreator;
use Module\Cart\Tests\Infrastructure\CartUnitTestCase;
use Module\Cart\Tests\Stub\Domain\CartStub;
use Module\Cart\Tests\Stub\Response\CartCreatedResponseStub;

final class CartCreatorTest extends CartUnitTestCase
{
    private $cartCreator;

    public function setUp()
    {
        $this->cartCreator = new CartCreator($this->getCartRepository());
    }

    /**
     * @test
     */
    public function it_should_save_a_cart()
    {
        $cart = CartStub::random();
        $cartCreatedResponse = CartCreatedResponseStub::create($cart->id()->__toString());

        $this->shouldSaveCart($cart);

        $this->assertEquals($cartCreatedResponse, $this->cartCreator->__invoke($cart->id(), $cart->customerId()));
    }
}