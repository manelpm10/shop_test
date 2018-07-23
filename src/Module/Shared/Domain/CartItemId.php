<?php

declare(strict_types=1);

namespace Module\Shared\Domain;

use ValueObjects\Identity\Uuid;

final class CartItemId extends Uuid
{
    public static function generate(): CartItemId
    {
        return new CartItemId(parent::generate());
    }
}
