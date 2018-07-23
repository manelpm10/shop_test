<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\CustomerId;

/**
 * Class CustomerIdStub.
 */
final class CustomerIdStub
{
    public static function create(int $customerId): CustomerId
    {
        return new CustomerId($customerId);
    }

    /**
     * @return CustomerId
     */
    public static function random()
    {
        return self::create(AbstractStubCreator::faker()->unique()->numberBetween(0, 1000));
    }
}
