<?php

declare(strict_types=1);

namespace Module\Cart\Service\Create;

use Module\Cart\Contract\Response\CartItemCreatedResponse;
use Module\Cart\Domain\CartItem;
use Module\Cart\Domain\CartItemQuantity;
use Module\Cart\Model\CartLineRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartLineId;
use Module\Shared\Domain\SellerProductId;

final class CartItemCreator
{
    private $repository;

    public function __construct(CartLineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        CartLineId $cartLineId,
        CartId $cartId,
        SellerProductId $sellerProductId,
        CartItemQuantity $quantity
    ): CartItemCreatedResponse
    {
        $cartItem = CartItem::create($cartLineId, $cartId, $sellerProductId, $quantity);
        $this->repository->save($cartItem);

        return new CartItemCreatedResponse($cartItem->id()->__toString());
    }
}