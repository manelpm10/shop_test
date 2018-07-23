<?php

namespace AppBundle\ApiBundle\DataFixtures\ORM;

use AppBundle\Entity\Customer;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class LoadCustomers.
 */
class LoadCustomers extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $customers = new Customer();

            $customers->setName($data['name']);
            $customers->setEmail($data['email']);
            $customers->setCreditCard($data['credit_card']);

            $manager->persist($customers);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getData()
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/../Data/customers.yml'));
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder()
    {
        return 0;
    }
}
