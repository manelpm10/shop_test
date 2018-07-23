<?php

namespace Module\Cart\Tests\Infrastructure;

use Module\Cart\Domain\Cart;
use Module\Cart\Model\CartRepository;

/**
 * Class CartUnitTestCase.
 */
class CartUnitTestCase extends \PHPUnit_Framework_TestCase
{
    private $cartRepository;

    protected function getCartRepository(): \PHPUnit_Framework_MockObject_MockObject
    {
        return $this->cartRepository = $this->cartRepository ?: $this->createMock(
            CartRepository::class
        );
    }

    protected function shouldSaveCart(Cart $cart): void
    {
        $this->getCartRepository()
            ->expects($this->once())
            ->method('save')
            ->with($cart);
    }
}
