<?php

declare(strict_types=1);

namespace Module\Cart\Infrastructure\Persistence\Doctrine;

use AppBundle\Entity\CartLine as BaseCartLine;
use Module\Cart\Domain\CartItem;
use Module\Cart\Model\CartLineRepository;
use Module\Shared\Infrastructure\Persistence\Doctrine\Repository;

/**
 * Class CartLineRepository.
 */
class CartLineRepositoryMySql extends Repository implements CartLineRepository
{
    protected function getRepositoryName(): string
    {
        return BaseCartLine::class;
    }

    public function save(CartItem $cartItem): void
    {
        $cartLineEntity = BaseCartLine::create(
            $cartItem->id()->__toString(),
            $cartItem->cartId()->__toString(),
            $cartItem->sellerProductId()->value(),
            $cartItem->quantity()->value()
        );

        $this->persist($cartLineEntity);
    }
}
