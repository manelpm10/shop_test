<?php

declare(strict_types=1);

namespace Module\Shared\Tests\Stub;

use Module\Shared\Domain\PaymentId;

final class PaymentIdStub
{
    public static function create(int $paymentId): PaymentId
    {
        return new PaymentId($paymentId);
    }

    public static function random(): PaymentId
    {
        return self::create(AbstractStubCreator::faker()->unique()->numberBetween(1, 2));
    }
}
