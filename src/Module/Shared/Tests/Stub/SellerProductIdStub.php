<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\SellerProductId;

final class SellerProductIdStub
{
    public static function create(int $sellerProductId): SellerProductId
    {
        return new SellerProductId($sellerProductId);
    }

    public static function random(): SellerProductId
    {
        return self::create(AbstractStubCreator::faker()->unique()->numberBetween(0, 1000));
    }
}
