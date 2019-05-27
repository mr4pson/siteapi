<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Ordr\Item;
use App\Entity\Ordr\Basket;

class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    
    public function getItemsByBasket(Basket $basket): Array
    {
        $items = $this->findBy([
            'basketId' => $basket->getId()
        ]);
        
        return $items;
    }

}

