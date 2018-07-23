<?php

declare(strict_types=1);

namespace Module\Cart\Domain;

use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CustomerId;

final class Cart
{
    private $id;
    private $customerId;

    public function __construct(CartId $id, CustomerId $customerId)
    {
        $this->id = $id;
        $this->customerId = $customerId;
    }

    public static function create(CustomerId $customerId): Cart
    {
        // TODO register new cart created event.

        return new self(CartId::generate(), $customerId);
    }

    public function id(): CartId
    {
        return $this->id;
    }

    public function customerId(): CustomerId
    {
        return $this->customerId;
    }
}
