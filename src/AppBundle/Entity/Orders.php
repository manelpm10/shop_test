<?php

namespace AppBundle\Entity;

/**
 * Orders
 */
class Orders
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
    private $paymentId;

    /**
     * @var string
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $status;

    public function __construct(string $id, string $cartId, float $totalAmount, string $status, int $paymentId)
    {
        $this->id = $id;
        $this->cartId = $cartId;
        $this->totalAmount = $totalAmount;
        $this->status = $status;
        $this->paymentId = $paymentId;
    }

    public static function create(string $id, string $cartId, float $totalAmount, string $status, int $paymentId)
    {
        return new self( $id, $cartId, $totalAmount, $status, $paymentId);
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
     * @return Orders
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
     * Set paymentId.
     *
     * @param int $paymentId
     *
     * @return Orders
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * Get paymentId.
     *
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set totalAmount.
     *
     * @param string $totalAmount
     *
     * @return Orders
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount.
     *
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Orders
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
