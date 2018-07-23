<?php

declare(strict_types=1);

namespace Module\Cart\Service\Create;

use Module\Cart\Contract\Response\CartCreatedResponse;
use Module\Cart\Domain\Cart;
use Module\Cart\Model\CartRepository;
use Module\Shared\Domain\CustomerId;

final class CartCreator
{
    private $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CustomerId $customerId) : CartCreatedResponse
    {
        $cart = Cart::create($customerId);
        $this->repository->save($cart);

        return new CartCreatedResponse($cart->id()->__toString());
    }
}