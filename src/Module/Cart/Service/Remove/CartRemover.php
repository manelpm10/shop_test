<?php

declare(strict_types=1);

namespace Module\Cart\Service\Remove;

use Module\Cart\Model\CartRepository;
use Module\Shared\Domain\CartId;

final class CartRemover
{
    private $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CartId $cartId): void
    {
        $cart = $this->repository->find($cartId);
        $this->repository->remove($cart);

        // TODO Remove cart items.
    }
}