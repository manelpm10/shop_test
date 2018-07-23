<?php

namespace Module\Cart\Tests\Infrastructure;

use Module\Cart\Domain\Cart;
use Module\Cart\Domain\CartItem;
use Module\Cart\Model\CartLineRepository;
use Module\Cart\Model\CartRepository;

/**
 * Class CartUnitTestCase.
 */
class CartUnitTestCase extends \PHPUnit_Framework_TestCase
{
    private $cartRepository;
    private $cartLineRepository;

    protected function getCartRepository(): \PHPUnit_Framework_MockObject_MockObject
    {
        return $this->cartRepository = $this->cartRepository ?: $this->createMock(
            CartRepository::class
        );
    }

    protected function getCartLineRepository(): \PHPUnit_Framework_MockObject_MockObject
    {
        return $this->cartLineRepository = $this->cartLineRepository ?: $this->createMock(
            CartLineRepository::class
        );
    }

    protected function shouldSaveCart(Cart $cart): void
    {
        $this->getCartRepository()
            ->expects($this->once())
            ->method('save')
            ->with($cart);
    }

    protected function shouldSaveCartItem(CartItem $cartItem): void
    {
        $this->getCartLineRepository()
            ->expects($this->once())
            ->method('save')
            ->with($cartItem);
    }
}
