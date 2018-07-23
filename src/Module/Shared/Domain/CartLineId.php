<?php

declare(strict_types=1);

namespace Module\Shared\Domain;

use ValueObjects\Identity\Uuid;

final class CartLineId extends Uuid
{
    public static function generate(): CartLineId
    {
        return new CartLineId(parent::generate());
    }
}
