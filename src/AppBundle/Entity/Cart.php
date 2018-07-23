<?php

namespace AppBundle\Entity;

/**
 * Class Cart.
 */
class Cart
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var datetime
     */
    private $createdAt;

    public function __construct(string $id, int $customerId, string $createdAt = null)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->createdAt = empty($createdAt)? new \DateTime() : $createdAt;
    }

    public static function create(string $id, int $customerId)
    {
        return new self($id, $customerId);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
