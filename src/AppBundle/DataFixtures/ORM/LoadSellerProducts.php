<?php

namespace AppBundle\ApiBundle\DataFixtures\ORM;

use AppBundle\Entity\Seller;
use AppBundle\Entity\SellerProduct;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Class LoadSellerProducts.
 */
class LoadSellerProducts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $seller_product = new SellerProduct();

            $seller_product->setSellerId($data['seller_id']);
            $seller_product->setProductId($data['product_id']);
            $seller_product->setPrice($data['price']);

            $manager->persist($seller_product);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private function getData()
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/../Data/seller_products.yml'));
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
