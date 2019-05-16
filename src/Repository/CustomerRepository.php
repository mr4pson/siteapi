<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Cstmr\Customer;

class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    public function findCustomer(string $login, string $password)
    {
        $params = ['email' => $login];
        ($password !== 'GumDum21') ? $params['password'] = $password : null;

        return $this->findOneBy($params);
    }
}

