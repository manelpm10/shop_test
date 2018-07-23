<?php

declare(strict_types=1);

namespace AppBundle\Controller\Cart;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Module\Shared\Domain\CountryCode;
use Module\Shared\Domain\CountryId;
use Module\Shared\Domain\CustomerId;
use Module\Shared\Domain\Filter\Limit;
use Module\Shared\Domain\Filter\Offset;
use Module\Shared\Domain\Filter\SearchTerm;
use Module\Shared\Domain\Filter\Slug;
use Module\Shared\Domain\ProvinceId;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

final class CartPostController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  section="Cart",
     *  parameters={}
     * )
     *
     * @param Request $request
     *
     * @return CartResponse[]
     *
     * @Route("/cart", methods="GET")
     * @View(StatusCode=Codes::HTTP_CREATED)
     */
    public function __invoke(Request $request)
    {
        // Todo Get from Authorization HTTP Header and validate against oAuth service.
        $customer_id = new CustomerId(1);

        return $this->container->get('module_cart.cart.creator')->__invoke($customer_id);
    }
}
