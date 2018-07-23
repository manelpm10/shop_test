<?php

namespace AppBundle\ApiBundle\DataFixtures\ORM;

use AppBundle\Entity\CustomerAddress;
use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class LoadCustomerAddresses.
 */
class LoadCustomerAddresses extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $customer_addresses = new CustomerAddress();

            $customer_addresses->setCustomerId($data['customer_id']);
            $customer_addresses->setCountryId($data['country_id']);
            $customer_addresses->setProvinceId($data['province_id']);
            $customer_addresses->setCityId($data['city_id']);
            $customer_addresses->setPostalCode($data['postal_code']);
            $customer_addresses->setStreet($data['street']);
            $customer_addresses->setIsDefault($data['is_default']);

            $manager->persist($customer_addresses);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getData()
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/../Data/customer_addresses.yml'));
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
