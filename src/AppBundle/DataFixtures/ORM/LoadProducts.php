<?php

namespace AppBundle\ApiBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class LoadProducts.
 */
class LoadProducts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $product = new Product();

            $product->setName($data['name']);

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getData()
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/../Data/products.yml'));
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
