<?php

declare(strict_types=1);

namespace Module\Cart\Service\Calculator;

use AppBundle\Entity\CartItem;
use Module\Cart\Contract\Response\CartAmountResponse;
use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;

final class CartTotalAmountCalculator
{
    private $itemRepository;

    public function __construct(CartItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function __invoke(CartId $cartId): CartAmountResponse
    {
        $amount = $this->calculateTotalAmount(
            $this->itemRepository->findByCartId($cartId)
        );

        return new CartAmountResponse($cartId->__toString(), $amount);
    }

    private function calculateTotalAmount(array $cartItems): float
    {
        $amount = 0.0;

        /** @var CartItem $cartItem */
        foreach ($cartItems as $cartItem)
        {
            $price = $cartItem['price'];
            $cartItem = $cartItem[0];

            $amount += ($price * $cartItem->getQuantity());
        }

        return $amount;
    }
}