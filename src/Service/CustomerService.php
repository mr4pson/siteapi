<?php 
namespace App\Service;

use App\Repository\CustomerRepository;
use App\Repository\HitRepository;
use App\Entity\Cstmr\Customer;
use App\Repository\ProductRepository;
use App\Repository\HitOfferRepository;

final class CustomerService
{

    private $CustomerRepository;
    private $hitRepository;
    private $productRepository;
    private $hitOfferRepository;

    public function __construct(CustomerRepository $CustomerRepository,HitRepository $hitRepository, ProductRepository $productRepository, HitOfferRepository $hitOfferRepository){
        $this->CustomerRepository = $CustomerRepository;
        $this->hitRepository = $hitRepository;
        $this->productRepository = $productRepository;
        $this->hitOfferRepository = $hitOfferRepository;
    }

    public function getHitRepository(){
        return $this->hitRepository;
    }
    public function getHitOfferRepository(){
        return $this->hitOfferRepository;
    }
    public function getProductRepository(){
        return $this->productRepository;
    }



    public function getCustomerByLogin(string $login, string $password)
    {
        $customer =  $this->CustomerRepository->findCustomer($login, $password);
        return $customer;
    }

    public function getCustomerById(int $customerId)
    {
        return $this->CustomerRepository->find($customerId);
    }
    public function canDoHit(Customer $customer){
        $active = $customer->getActive();
        $accessHits = $this->getHitsCountAccess($customer);

        return ($active&&$accessHits)? true:false;

    }
    public function getHitsCountAccess(Customer $customer){

        $hits = $this->hitRepository->getHitsCountToday($customer->getId());
        $maxQueryCount = $customer->getMaxQueryCount();
        return ($maxQueryCount>$hits)? true: false;

    }

}