<?php

declare(strict_types=1);

namespace Module\Cart\Service\Create;

use Module\Cart\Contract\Response\CartItemCreatedResponse;
use Module\Cart\Domain\CartItem;
use Module\Cart\Domain\CartItemQuantity;
use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;
use Module\Shared\Domain\SellerProductId;

final class CartItemCreator
{
    private $repository;

    public function __construct(CartItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        CartItemId $cartItemId,
        CartId $cartId,
        SellerProductId $sellerProductId,
        CartItemQuantity $quantity
    ): CartItemCreatedResponse
    {
        $cartItem = CartItem::create($cartItemId, $cartId, $sellerProductId, $quantity);
        $this->repository->save($cartItem);

        return new CartItemCreatedResponse($cartItem->id()->__toString());
    }
}