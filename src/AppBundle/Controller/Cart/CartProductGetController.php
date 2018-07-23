<?php

declare(strict_types=1);

namespace AppBundle\Controller\Cart;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

final class CartProductGetController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  section="Cart",
     *  parameters={
     *  }
     * )
     *
     * @param Request $request
     *
     * @return CartResponse[]
     *
     * @Route("/cart/{cart_id}/product", methods="GET")
     * @View(StatusCode=Codes::HTTP_OK)
     */
    public function __invoke(Request $request)
    {
        return [];
    }
}
