<?php

declare(strict_types=1);

namespace Module\Cart\Infrastructure\Persistence\Doctrine;

use AppBundle\Entity\Cart as BaseCart;
use Module\Cart\Domain\Cart;
use Module\Cart\Model\CartRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CustomerId;
use Module\Shared\Infrastructure\Persistence\Doctrine\Repository;

class CartRepositoryMySql extends Repository implements CartRepository
{
    protected function getRepositoryName(): string
    {
        return BaseCart::class;
    }

    public function find(CartId $id): ?Cart
    {
        $cartEntity = $this->repository->find($id);
        if (!empty($cartEntity)) {
            return new Cart(
                new CartId($cartEntity->getId()),
                new CustomerId($cartEntity->getCustomerId())
            );
        }
    }

    public function save(Cart $cart): void
    {
        $cartEntity = BaseCart::create(
            $cart->id()->__toString(),
            $cart->customerId()->value()
        );

        $this->persist($cartEntity);
    }

    public function delete(Cart $cart): void
    {
        $cartEntity = BaseCart::create(
            $cart->id()->__toString(),
            $cart->customerId()->value()
        );

        $this->remove($cartEntity);
    }
}
