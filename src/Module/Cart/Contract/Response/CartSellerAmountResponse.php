<?php

declare(strict_types=1);

namespace Module\Cart\Contract\Response;

final class CartSellerAmountResponse
{
    private $id;
    private $sellerId;
    private $amount;

    public function __construct(string $id, int $sellerId, float $amount)
    {
        $this->id = $id;
        $this->sellerId = $sellerId;
        $this->amount = $amount;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function sellerId(): int
    {
        return $this->sellerId;
    }

    public function amount(): float
    {
        return $this->amount;
    }
}