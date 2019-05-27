<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Ordr\Basket;
use App\Entity\Cstmr\Customer;
use App\Entity\Ordr\Item;
use Doctrine\Common\Persistence\ObjectManager;

class BasketRepository extends ServiceEntityRepository
{
    private $manager;
    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Basket::class);
        $this->manager = $manager;
    }

    public function getBasketsByCustomer(Customer $customer)
    {
        $baskets = $this->findBy([
            'customer' => $customer
        ]);
        
        return $baskets;
    }

    public function getActiveBasket(Customer $customer)
    {
        $basket = $this->findOneBy([
            'customer' => $customer,
            'active' => true
        ]);
        
        return $basket;
    }

    public function createBasket(array $data)
    {
        $basket = new Basket();
        $basket->setTitle($data['title']);
        $basket->setActive($data['active']);
        $basket->setStatus($data['status']);
        $basket->setCustomer($data['customer']);

        $this->manager->persist($basket);
        $this->manager->flush();
        
        return $basket;
    }

    public function updateBasket(int $id, array $data)
    {
        $basket = $this->find($id);
        $basket->setTitle($data['title']);

        $this->manager->persist($basket);
        $this->manager->flush();
        
        return $basket;
    }

    public function getBasket($id)
    {
        $baskets = $this->find($id);
        
        return $baskets;
    }
}

