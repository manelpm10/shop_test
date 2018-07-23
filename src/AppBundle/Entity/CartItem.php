<?php

namespace AppBundle\Entity;

/**
 * CartItem
 */
class CartItem
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $cartId;

    /**
     * @var int
     */
    private $sellerProductId;

    /**
     * @var int
     */
    private $quantity;

    function __construct(string $id, string $cartId, int $sellerProductId, int $quantity)
    {
        $this->id = $id;
        $this->cartId = $cartId;
        $this->sellerProductId = $sellerProductId;
        $this->quantity = $quantity;
    }

    public static function create(string $id, string $cartId, int $sellerProductId, int $quantity)
    {
        return new self($id, $cartId, $sellerProductId, $quantity);
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cartId.
     *
     * @param int $cartId
     *
     * @return CartItem
     */
    public function setCartId($cartId)
    {
        $this->cartId = $cartId;

        return $this;
    }

    /**
     * Get cartId.
     *
     * @return int
     */
    public function getCartId()
    {
        return $this->cartId;
    }

    /**
     * Set sellerProductId.
     *
     * @param int $sellerProductId
     *
     * @return CartItem
     */
    public function setSellerProductId($sellerProductId)
    {
        $this->sellerProductId = $sellerProductId;

        return $this;
    }

    /**
     * Get sellerProductId.
     *
     * @return int
     */
    public function getSellerProductId()
    {
        return $this->sellerProductId;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return CartItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
