<?php 
namespace App\Service;

use App\Repository\HitRepository;


final class HitService
{

    private $hitRepository;

    public function __construct(HitRepository $hitRepository){
        $this->hitRepository = $hitRepository;
    }
    public function getRepository(){
        return  $this->hitRepository;
    }

    /*public function getOrdersByCustomer(Customer $customer)
    {
        $orders = $this->orderRepository->getOrdersByCustomer($customer);
        return $orders;
    }*/

}