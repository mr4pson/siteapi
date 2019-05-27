<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use App\Entity\Prdt\Price;


class PriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, AdapterInterface $cache)
    {
        $this->cache = $cache;
        parent::__construct($registry, Price::class);
    }

}

