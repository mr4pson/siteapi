<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use App\Entity\Prdt\Offer;
use App\Entity\Prdt\Product;

class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, AdapterInterface $cache)
    {
        $this->cache = $cache;
        parent::__construct($registry, Offer::class);
    }

    public function find($id, $lockMode = NULL, $lockVersion = NULL): Product
    {  
        echo"OFFER FIND ".$id."\n";
        $key = md5('OfferRepository'.$id);
        $item = $this->cache->getItem($key);
        $item->expiresAfter(10);
        if (!$item->isHit()) {
            $res = parent::find($id);
            $item->set($res);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function findOfferByProduct(Product $product): array
    {
        return $this->findBy(['product' => $product->getId(), 'isActual'=>true]);
    }
}

