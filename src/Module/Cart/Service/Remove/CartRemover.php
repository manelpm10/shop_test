<?php

declare(strict_types=1);

namespace Module\Cart\Service\Remove;

use Module\Cart\Model\CartItemRepository;
use Module\Cart\Model\CartRepository;
use Module\Shared\Domain\CartId;

final class CartRemover
{
    private $repository;
    private $itemRepository;

    public function __construct(CartRepository $repository, CartItemRepository $itemRepository)
    {
        $this->repository = $repository;
        $this->itemRepository = $itemRepository;
    }

    public function __invoke(CartId $cartId): void
    {
        $this->repository->beginTransaction();

        $cart = $this->repository->find($cartId);
        $this->repository->delete($cart);

        $this->itemRepository->deleteByCartId($cartId);

        $this->repository->commit();
    }
}