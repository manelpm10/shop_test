<?php

namespace AppBundle\Entity;

/**
 * CustomerAddress
 */
class CustomerAddress
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
     * @var string
     */
    private $street;

    /**
     * @var int
     */
    private $provinceId;

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var int
     */
    private $countryId;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var bool
     */
    private $isDefault;


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
     * Set customerId.
     *
     * @param int $customerId
     *
     * @return CustomerAddress
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set street.
     *
     * @param string $street
     *
     * @return CustomerAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set provinceId.
     *
     * @param int $provinceId
     *
     * @return CustomerAddress
     */
    public function setProvinceId($provinceId)
    {
        $this->provinceId = $provinceId;

        return $this;
    }

    /**
     * Get provinceId.
     *
     * @return int
     */
    public function getProvinceId()
    {
        return $this->provinceId;
    }

    /**
     * Set cityId.
     *
     * @param int $cityId
     *
     * @return CustomerAddress
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get cityId.
     *
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set countryId.
     *
     * @param int $countryId
     *
     * @return CustomerAddress
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get countryId.
     *
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Set postalCode.
     *
     * @param string $postalCode
     *
     * @return CustomerAddress
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set isDefault.
     *
     * @param bool $isDefault
     *
     * @return CustomerAddress
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault.
     *
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }
}
