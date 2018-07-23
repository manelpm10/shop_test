<?php

declare(strict_types=1);

namespace Module\Cart\Tests\Behaviour\Create;

use Module\Cart\Service\Create\CartItemCreator;
use Module\Cart\Tests\Infrastructure\CartUnitTestCase;
use Module\Cart\Tests\Stub\Domain\CartItemStub;
use Module\Cart\Tests\Stub\Response\CartItemCreatedResponseStub;

final class CartItemCreatorTest extends CartUnitTestCase
{
    private $cartCreator;

    public function setUp()
    {
        $this->cartItemCreator = new CartItemCreator($this->getCartItemRepository());
    }

    /**
     * @test
     */
    public function it_should_save_a_cart_item()
    {
        $cartItem = CartItemStub::random();
        $cartItemCreatedResponse = CartItemCreatedResponseStub::create($cartItem->id()->__toString());

        $this->shouldSaveCartItem($cartItem);

        $this->assertEquals(
            $cartItemCreatedResponse,
            $this->cartItemCreator->__invoke(
                $cartItem->id(),
                $cartItem->cartId(),
                $cartItem->sellerProductId(),
                $cartItem->quantity()
            )
        );
    }
}