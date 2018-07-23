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
use Module\Shared\Domain\CartItemId;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

final class CartItemPutController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  section="Cart",
     *  parameters={
     *      {"name"="quantity", "dataType"="int", "required"=true},
     *  }
     * )
     *
     * @param Request $request
     *
     * @return CartItemCreatedResponse
     *
     * @Route("/cart/{cart_id}/item/{item_id}", methods="PUT")
     * @View(StatusCode=Codes::HTTP_NO_CONTENT)
     */
    public function __invoke(Request $request)
    {
        // Todo Check given user via Authorization HTTP Header has permissions over the cart.
        // if (!USER_PERMISSIONS) { RETURN 401; }

        $id = new CartItemId($request->get('item_id'));
        $cartId = new CartId($request->get('cart_id'));
        $quantity = new CartItemQuantity($request->get('quantity'));

        return $this->container->get('module_cart.cart.item.updater')
            ->__invoke($id, $cartId, $quantity);
    }
}
