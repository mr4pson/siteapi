<?php 
namespace App\Service;

use App\Repository\OfferRepository;
use App\Repository\ProductRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;


final class OfferService
{

    private $offerRepository;
    private $productRepository;

    public function __construct(OfferRepository $offerRepository , ProductRepository $productRepository, AdapterInterface $cache){
        $this->offerRepository = $offerRepository;
        $this->productRepository = $productRepository;
        $this->cache = $cache;
    }

    

    public function getOffers(int $productId):array
    {

        //$this->cache->delete(md5('getOffersproductId_'.$productId));

        //$item = $this->cache->getItem(md5('getOffersproductId_'.$productId));
        //$item->expiresAfter(5);
        //if (!$item->isHit()) {
            echo "NO CACHE!";
            $product =  $this->productRepository->find($productId);
            

            $products =  $this->productRepository->findByCrossGroupId($product);

            foreach($products as $product){
                $offers = $this->offerRepository->findOfferByProduct($product);
                foreach($offers as $offer){
                    $r[] = $offer;
                }
            }
        //    $item->set($r);
        //    $this->cache->save($item);
        //}else{
            echo "HAS";
        //}
        //$a = $item->get();
        dump($r);
        return $r;
    }

    public function getOneOffer(int $offerId)
    {
        $offer =  $this->offerRepository->find($offerId);
        return $offer;
    }

    
}