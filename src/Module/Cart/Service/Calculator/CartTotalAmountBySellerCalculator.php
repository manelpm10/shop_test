<?php

declare(strict_types=1);

namespace Module\Cart\Service\Calculator;

use AppBundle\Entity\CartItem;
use Module\Cart\Contract\Response\CartSellerAmountResponse;
use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;

final class CartTotalAmountBySellerCalculator
{
    private $itemRepository;

    public function __construct(CartItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function __invoke(CartId $cartId): array
    {
        $amounts = $this->calculateTotalAmountBySeller(
            $this->itemRepository->findByCartId($cartId)
        );

        return $this->createAmountResponses($cartId, $amounts);
    }

    private function calculateTotalAmountBySeller(array $cartItems): array
    {
        $amounts = [];

        /** @var CartItem $cartItem */
        foreach ($cartItems as $cartItem)
        {
            $price = $cartItem['price'];
            $sellerId = $cartItem['sellerId'];
            $cartItem = $cartItem[0];

            if (empty($amounts[$sellerId]))
            {
                $amounts[$sellerId] = 0.0;
            }

            $amounts[$sellerId] += ($price * $cartItem->getQuantity());
        }

        return $amounts;
    }

    private function createAmountResponses(CartId $cartId, $amounts): array
    {

        return array_map(
            function (int $sellerId, float $amount) use ($cartId) {
                return new CartSellerAmountResponse(
                    $cartId->__toString(),
                    $sellerId,
                    $amount
                );
            },
            array_keys($amounts),
            $amounts
        );
    }
}