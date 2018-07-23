<?php

declare(strict_types=1);

namespace Module\Shared\Domain;

use ValueObjects\Identity\Uuid;

final class CartId extends Uuid
{
    public static function generate(): CartId
    {
        return new CartId(parent::generate());
    }
}
