<?php

declare(strict_types=1);

namespace AppBundle\Controller\Order;

use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Module\Order\Contract\Response\OrderCreatedResponse;
use Module\Order\Domain\OrderStatus;
use Module\Order\Domain\OrderTotalAmount;
use Module\Shared\Domain\CartId;
use Module\Shared\Domain\CustomerId;
use Module\Shared\Domain\OrderId;
use Module\Shared\Domain\PaymentId;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class OrderPostController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  section="Order",
     *  parameters={
     *      {"name"="cart_id", "dataType"="string", "required"=true},
     *      {"name"="payment_id", "dataType"="int", "required"=true},
     *     }
     * )
     *
     * @param Request $request
     *
     * @return OrderCreatedResponse
     *
     * @Route("/order", methods="POST")
     * @View(StatusCode=Codes::HTTP_CREATED)
     */
    public function __invoke(Request $request)
    {
        // TODO Get from Authorization HTTP Header and validate against oAuth service.
        // TODO Validate if customer has permissions over cart.
        //$customerId = new CustomerId(1);

        $id = OrderId::generate();
        $cartId = new CartId($request->get('cart_id'));
        $totalAmountResponse = $this->container->get('module_cart.cart.total.amount.calculator')->__invoke($cartId);
        $totalAmount = new OrderTotalAmount($totalAmountResponse->amount());
        $status = new OrderStatus(OrderStatus::PENDING);
        $paymentId = new PaymentId($request->get('payment_id'));

        return $this->container->get('module_order.order.creator')
            ->__invoke($id, $cartId, $totalAmount, $status, $paymentId);
    }
}