<?php

declare(strict_types=1);

namespace AppBundle\Controller\Cart;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Module\Cart\Contract\Response\CartAmountResponse;
use Module\Cart\Contract\Response\CartCreatedResponse;
use Module\Shared\Domain\CartId;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

final class CartGetTotalAmountBySellerController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  section="Cart",
     *  parameters={}
     * )
     *
     * @param Request $request
     *
     * @return CartAmountResponse
     *
     * @Route("/cart/{cart_id}/amount_by_seller", methods="GET")
     * @View(StatusCode=Codes::HTTP_OK)
     */
    public function __invoke(Request $request)
    {
        // Todo Get from Authorization HTTP Header and validate against oAuth service.
        $cartId = new CartId($request->get('cart_id'));

        return $this->container->get('module_cart.cart.total.amount.by.seller.calculator')->__invoke($cartId);
    }
}
