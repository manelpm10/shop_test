<?php

declare(strict_types=1);

namespace Module\Order\Contract\Response;

final class OrderCreatedResponse
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