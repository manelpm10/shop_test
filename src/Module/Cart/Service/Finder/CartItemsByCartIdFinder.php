<?php

declare(strict_types=1);

namespace Module\Cart\Service\Finder;

use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;

final class CartItemsByCartIdFinder
{
    private $repository;

    public function __construct(CartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CartId $cartId)
    {
        return $this->repository->findByCartId($cartId);
    }
}