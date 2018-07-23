<?php

declare(strict_types=1);

namespace AppBundle\Controller\Cart;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Module\Cart\Contract\Response\CartItemCreatedResponse;
use Module\Cart\Domain\CartItemQuantity;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CartLineId;
use Module\Shared\Domain\SellerProductId;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

final class CartItemPostController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  section="Cart",
     *  parameters={
     *      {"name"="seller_product_id", "dataType"="int", "required"=true},
     *      {"name"="quantity", "dataType"="int", "required"=true},
     *  }
     * )
     *
     * @param Request $request
     *
     * @return CartItemCreatedResponse
     *
     * @Route("/cart/{cart_id}/item", methods="GET")
     * @View(StatusCode=Codes::HTTP_CREATED)
     */
    public function __invoke(Request $request)
    {
        // Todo Check given user via Authorization HTTP Header has permissions over the cart.
        // if (!USER_PERMISSIONS) { RETURN 401; }

        $cartLineId = CartLineId::generate();
        $cartId = new CartId($request->get('cart_id'));
        $sellerProductId = new SellerProductId($request->get('seller_product_id'));
        $quantity = new CartItemQuantity($request->get('quantity'));

        return $this->container->get('module_cart.cart.item.creator')
            ->__invoke($cartLineId, $cartId, $sellerProductId, $quantity);
    }
}
