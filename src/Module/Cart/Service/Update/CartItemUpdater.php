<?php

declare(strict_types=1);

namespace Module\Cart\Service\Update;

use Module\Cart\Contract\Exception\CartItemNotInCartException;
use Module\Cart\Domain\CartItemQuantity;
use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;

class CartItemUpdater
{
    private $repository;

    public function __construct(CartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        CartItemId $id,
        CartId $cartId,
        CartItemQuantity $quantity
    ): void
    {
        $cartItem = $this->repository->find($id);
        if (empty($cartItem) || $cartItem->cartId()->value() !== $cartId->value()) {
            throw new CartItemNotInCartException($cartId, $id);
        }

        $cartItem->updateQuantity($quantity);
        $this->repository->update($cartItem);
    }
}