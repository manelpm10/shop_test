<?php

namespace AppBundle\Entity;

/**
 * CartLine
 */
class CartLine
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
     * @return CartLine
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
     * @return CartLine
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
     * @return CartLine
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
