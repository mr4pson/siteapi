<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Hstry\HitOffer;
use App\Entity\Hstry\Hit;
use App\OfferItem;


class HitOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, AdapterInterface $cache, ObjectManager $manager)
    {
        $this->cache = $cache;
        $this->manager = $manager;
        parent::__construct($registry, HitOffer::class);
    }


    public function add(Hit $hit, OfferItem $offerItem) {

        $hitOffer = new HitOffer();

        $hitOffer->setHit($hit);
        $hitOffer->setPriceList($offerItem->getPriceList());
        $hitOffer->setProduct($offerItem->getProduct());

        $hitOffer->setBrand($offerItem->getBrand());
        $hitOffer->setOem($offerItem->getOem());
        $hitOffer->setPrice($offerItem->getPriceCalculated());
        $hitOffer->setSrok($offerItem->getSrok());
        $hitOffer->setRest($offerItem->getRest());

        //$this->manager->persist($hitOffer);
        //$this->manager->flush();
        return $hitOffer;
    }


}

