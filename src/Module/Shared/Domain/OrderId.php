<?php

declare(strict_types=1);

namespace Module\Shared\Domain;

use ValueObjects\Identity\Uuid;

final class OrderId extends Uuid
{
    public static function generate(): OrderId
    {
        return new OrderId(parent::generate());
    }
}
