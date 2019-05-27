<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use App\Entity\Prdt\Product;

class ProductRepository extends ServiceEntityRepository
{   

    public function __construct(ManagerRegistry $registry, AdapterInterface $cache)
    {
        $this->cache = $cache;
        parent::__construct($registry, Product::class);
    }

    /*public function find($id, $lockMode = NULL, $lockVersion = NULL): Product
    {   
        //echo"PROD FIND ".$id."\n";
        $key = md5('ProductRepository_'.$id);
        $item = $this->cache->getItem($key);
        $item->expiresAfter(10);
        if (!$item->isHit()) {
            $res = parent::find($id);
            $item->set($res);
            $this->cache->save($item);
        }
        return $item->get();
    }*/


    public function findByCrossGroupId(Product $product): array
    {
        return $this->findBy(['crossGroupId' => $product->getCrossGroupId()]);
    }

    public function findByOem(string $oem): array
    {
        return $this->findBy(['oem' => $oem]);
    }
}

