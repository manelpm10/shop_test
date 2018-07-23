<?php

declare(strict_types=1);

namespace Module\Cart\Contract\Response;

final class CartItemCreatedResponse
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}