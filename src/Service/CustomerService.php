<?php 
namespace App\Service;

use App\Repository\CustomerRepository;

final class CustomerService
{

    private $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository){
        $this->CustomerRepository = $CustomerRepository;
    }

    public function getCustomer(string $login, string $password)
    {
        $customer =  $this->CustomerRepository->findCustomer($login, $password);

        return $customer;
    }

    
}