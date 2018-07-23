<?php

declare(strict_types=1);

namespace Module\Cart\Infrastructure\Persistence\Doctrine;

use AppBundle\Entity\Cart as BaseCart;
use Module\Cart\Domain\Cart;
use Module\Cart\Model\CartRepository;
use Module\Shared\Infrastructure\Persistence\Doctrine\Repository;

/**
 * Class CartRepository.
 */
class CartRepositoryMySql extends Repository implements CartRepository
{
    protected function getRepositoryName(): string
    {
        return BaseCart::class;
    }

    public function save(Cart $cart): void
    {
        $cartEntity = BaseCart::create(
            $cart->id()->__toString(),
            $cart->customerId()->value()
        );

        $this->persist($cartEntity);
    }
}
