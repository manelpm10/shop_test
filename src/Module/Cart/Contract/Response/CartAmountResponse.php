<?php

declare(strict_types=1);

namespace Module\Cart\Contract\Response;

final class CartAmountResponse
{
    private $id;
    private $amount;

    public function __construct(string $id, float $amount)
    {
        $this->id = $id;
        $this->amount = $amount;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function amount(): float
    {
        return $this->amount;
    }
}