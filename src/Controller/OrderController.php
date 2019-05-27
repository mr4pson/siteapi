<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Service\OrderService;
use App\Service\RestResponseService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ordr\Order;

class OrderController extends RestController
{
    private $orderService;

    public function setOrderService(OrderService $orderService){
        $this->orderService = $orderService;
    }

    /**
     * @Route("orders", 
     *     name="getOrders",
     *     methods={"GET"})
     */
    public function getOrders()
    {

        $response = new Response();
        $orders = $this->orderService->getOrdersByCustomer($this->getCustomer());

        return $this->restResponseService->response(
            array_map(function (Order $order): array {
                return [
                    'id' => $order->getId(),
                    'dc' => $order->getDc()->format('d/m/Y'),
                    'dm' => $order->getDm()->format('d/m/Y'),
                    'dt' => !empty($order->getDt()) ? $order->getDt()->format('d/m/Y') : null,
                    'comment' => $order->getComment(),
                    'companyId' => $order->getCompanyId(),
                    'branchId' => $order->getBranchId(),
                    'statusCode' => $order->getStatusCodeCode(),
                    'customerId' => $order->getCustomerId(),
                    'parentId' => $order->getParentId(),
                ];
            }, $orders)
        );

    }

    /**
     * @Route("orders/{id}", 
     *     name="getOrder",
     *     methods={"GET"},
     *     requirements={"id" = "\d+"})
     */
    public function getOrder(int $id)
    {
        $response = new Response();
        $order = $this->orderService->getOrder($id);

        return $this->restResponseService->response([
            'id' => $order->getId(),
            'dc' => $order->getDc()->format('d/m/Y'),
            'dm' => $order->getDm()->format('d/m/Y'),
            'dt' => $order->getDt()->format('d/m/Y'),
            'comment' => $order->getComment(),
            'companyId' => $order->getCompanyId(),
            'statusCode' => $order->getStatusCodeCode(),
            'customerId' => $order->getCustomerId(),
            'parentId' => $order->getParentId(),
        ]);
    }

    /**
     * @Route("orders", 
     *     name="createOrder",
     *     methods={"POST"})
     */
    public function createOrder(Request $request)
    {
        $response = new Response();
        
        $data = [
            'comment' => $this->getParam('comment'),
            'companyId' => $this->getParam('companyId'),
            'statusCode' => $this->getParam('statusCode'),
            'customer' => $this->getCustomer(),
            'parentId' => $this->getParam('parentId'),
        ];

        $order = $this->orderService->createOrder($data);

        return $this->restResponseService->response([
            'id' => $order->getId()
        ]);
    }

    /**
     * @Route("/orders/{id}", 
     *     name="updateOrder",
     *     methods={"PUT"},
     *     requirements={"id" = "\d+"})
     */
    public function updateOrder(int $id, Request $request)
    {
        $response = new Response();

        $data = [
            'comment' => $this->getParam('comment'),
            'companyId' => $this->getParam('companyId'),
            'statusCode' => $this->getParam('statusCode'),
            'parentId' => $this->getParam('parentId'),
        ];
        $order = $this->orderService->updateOrder($id, $data);

        return $this->restResponseService->response([
            'id' => $order->getId()
        ]);
    }
}
