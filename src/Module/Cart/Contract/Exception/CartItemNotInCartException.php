<?php

declare(strict_types=1);

namespace Module\Cart\Contract\Exception;

use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartItemId;

class CartItemNotInCartException extends \Exception
{
    public function __construct(CartId $cartId, CartItemId $cartItemId)
    {
        parent::__construct(sprintf('The cart itme %s is not in cart %s',
            $cartItemId,
            $cartId
        ));

        $this->code = 404;
    }
}