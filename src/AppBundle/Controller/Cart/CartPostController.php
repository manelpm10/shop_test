<?php

declare(strict_types=1);

namespace AppBundle\Controller\Cart;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Module\Cart\Contract\Response\CartCreatedResponse;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CustomerId;
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
     * @return CartCreatedResponse
     *
     * @Route("/cart", methods="GET")
     * @View(StatusCode=Codes::HTTP_CREATED)
     */
    public function __invoke(Request $request)
    {
        // Todo Get from Authorization HTTP Header and validate against oAuth service.
        $customerId = new CustomerId(1);
        $cartId = CartId::generate();

        return $this->container->get('module_cart.cart.creator')->__invoke($cartId, $customerId);
    }
}
