<?php

declare(strict_types=1);

namespace Module\Cart\Infrastructure\Persistence\Doctrine;

use AppBundle\Entity\CartItem as BaseCartItem;
use Module\Cart\Domain\CartItem;
use Module\Cart\Domain\CartItemQuantity;
use Module\Cart\Model\CartItemRepository;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;
use Module\Shared\Domain\SellerProductId;
use Module\Shared\Infrastructure\Persistence\Doctrine\Repository;

/**
 * Class CartItemRepository.
 */
class CartItemRepositoryMySql extends Repository implements CartItemRepository
{
    protected function getRepositoryName(): string
    {
        return BaseCartItem::class;
    }

    public function find(CartItemId $id): ?CartItem
    {
        $cartItemEntity = $this->repository->find($id);
        if (!empty($cartItemEntity)) {
            return new CartItem(
                new CartItemId($cartItemEntity->getId()),
                new CartId($cartItemEntity->getCartId()),
                new SellerProductId($cartItemEntity->getSellerProductId()),
                new CartItemQuantity($cartItemEntity->getQuantity())
            );
        }
    }

    public function save(CartItem $cartItem): void
    {
        $cartItemEntity = BaseCartItem::create(
            $cartItem->id()->__toString(),
            $cartItem->cartId()->__toString(),
            $cartItem->sellerProductId()->value(),
            $cartItem->quantity()->value()
        );

        $this->persist($cartItemEntity);
    }

    public function delete(CartItem $cartItem): void
    {
        $cartItemEntity = BaseCartItem::create(
            $cartItem->id()->__toString(),
            $cartItem->cartId()->__toString(),
            $cartItem->sellerProductId()->value(),
            $cartItem->quantity()->value()
        );

        $this->remove($cartItemEntity);
    }

    public function deleteByCartId(CartId $cartId): void
    {
        $this->queryBuilder()
            ->delete(BaseCartItem::class, 'ci')
            ->where('ci.cartId = :cartId')
            ->setParameter('cartId', $cartId)
            ->getQuery()
            ->execute();
    }
}
