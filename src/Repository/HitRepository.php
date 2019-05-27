<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Hstry\Hit;


class HitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, AdapterInterface $cache, ObjectManager $manager)
    {
        $this->cache = $cache;
        $this->manager = $manager;
        parent::__construct($registry, Hit::class);
    }
    public function getHitsCountToday($customerId){
        return $this->createQueryBuilder('hit')
            ->select('count(hit.id) as hits')
            ->andWhere('hit.customerId = :customerId')
            ->andWhere('hit.dc >= :dc')
            ->setParameter('customerId', $customerId)
            ->setParameter('dc', date('Y-m-d 00:00:00'))
            ->getQuery()
            ->getSingleResult()['hits'];
    }
    public function updateHit($hit, $productId) {
        $hit->setProductId($productId);
        $this->manager->persist($hit);
        $this->manager->flush();
        return $hit;
    }

    public function save(Hit $hit):Hit{
        $this->manager->persist($hit);
        $this->manager->flush();
        return $hit;
    }

    public function addHit($productId, $customer, $type=1, $mobile = false) {

        $hit = new Hit();
        $hit->setProductId($productId);
        $hit->setCustomerId($customer);
        $hit->setType($type);
        $hit->setMobile($mobile);
        $hit->setDc(new \DateTime());
        $this->manager->persist($hit);
        $this->manager->flush();
        return $hit;
    }
    public function addHitText($customer, $text, $type=1, $mobile = false) {

        $hit = new Hit();
        ($text)?$hit->setText($text):null;
        $hit->setCustomerId($customer);
        $hit->setType($type);
        $hit->setMobile($mobile);
        $hit->setDc(new \DateTime());
        $this->manager->persist($hit);
        $this->manager->flush();
        return $hit;
    }

}

