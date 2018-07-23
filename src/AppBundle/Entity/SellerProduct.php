<?php

namespace AppBundle\Entity;

/**
 * SellerProduct
 */
class SellerProduct
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $sellerId;

    /**
     * @var int
     */
    private $productId;

    /**
     * @var string
     */
    private $price;


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
     * Set sellerId.
     *
     * @param int $sellerId
     *
     * @return SellerProduct
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;

        return $this;
    }

    /**
     * Get sellerId.
     *
     * @return int
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * Set productId.
     *
     * @param int $productId
     *
     * @return SellerProduct
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set price.
     *
     * @param string $price
     *
     * @return SellerProduct
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}
