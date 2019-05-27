<?php 
namespace App\Service;

use Symfony\Component\Cache\Adapter\AdapterInterface;

use App\Repository\PartnerRepository;
use App\Repository\PartnerMapRepository;
use App\Entity\Partner\Partner;

final class PartnerService
{

    public $partnerRepository;
    public $partnerMapRepository;

    public function __construct(PartnerRepository $partnerRepository , PartnerMapRepository $partnerMapRepository, AdapterInterface $cache){
        $this->partnerRepository = $partnerRepository;
        $this->partnerMapRepository = $partnerMapRepository;
        $this->cache = $cache;
    }

    public function getFromTo(Partner $partnerCustomer, Partner $partnerPrice){
        return $this->partnerMapRepository->findOneBy(['partnerIdFrom'=>$partnerPrice->getId(), 'partnerIdTo'=>$partnerCustomer->getId()]);
    }
}