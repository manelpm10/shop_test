<?php

declare(strict_types=1);

namespace Module\Cart\Service\Remove;

use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;

final class CartItemsByCartIdRemover
{
    private $repository;

    public function __construct(CartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CartId $cartId): void
    {
        $this->repository->deleteByCartId($cartId);
    }
}