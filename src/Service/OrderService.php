<?php 
namespace App\Service;

use App\Repository\OrderRepository;
use App\Entity\Cstmr\Customer;
use App\Repository\StatusCodeRepository;
use App\Repository\BranchRepository;

final class OrderService
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository, StatusCodeRepository $statusCodeRepository, BranchRepository $branchRepository){
        $this->orderRepository = $orderRepository;
        $this->statusCodeRepository = $statusCodeRepository;
        $this->branchRepository = $branchRepository;
    }

    public function getOrdersByCustomer(Customer $customer)
    {
        $orders = $this->orderRepository->getOrdersByCustomer($customer);
        return $orders;
    }

    public function getOrder(int $id)
    {
        $order = $this->orderRepository->getOrder($id);
        return $order;
    }

    public function createOrder($data)
    {
        $data['statusCode'] = $this->statusCodeRepository->getStatusCode($data['statusCode']);
        $data['parent'] = $this->orderRepository->getOrder($data['parentId']);
        $data['branch'] = $this->branchRepository->getBranch(1);

        $order = $this->orderRepository->createOrder($data);
        return $order;
    }

    public function updateOrder(int $id, array $data)
    {
        $data['statusCode'] = $this->statusCodeRepository->getStatusCode($data['statusCode']);
        $data['parent'] = $this->orderRepository->getOrder($data['parentId']);

        $order = $this->orderRepository->updateOrder($id, $data);
        return $order;
    }
}