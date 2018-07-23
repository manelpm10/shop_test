<?php

declare(strict_types=1);

namespace Module\Cart\Service\Remove;

use Module\Cart\Contract\Exception\CartItemNotInCartException;
use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;

final class CartItemRemover
{
    private $repository;

    public function __construct(CartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CartId $cartId, CartItemId $cartItemId): void
    {
        $cartItem = $this->repository->find($cartItemId);
        if ($cartItem->cartId()->value() !== $cartId->value()) {
            throw new CartItemNotInCartException($cartId, $cartItemId);
        }

        $this->repository->delete($cartItem);

    }
}