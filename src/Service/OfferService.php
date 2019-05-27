<?php 
namespace App\Service;

use App\Repository\OfferRepository;
use App\Repository\ProductRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use App\Repository\PartnerRepository;
use App\Entity\Hstry\Hit;
use App\Entity\Cstmr\Customer;
use App\Entity\Partner\Partner;
use App\Entity\Prdt\Offer;
use App\Repository\PartnerMapRepository;
use App\Repository\PriceRepository;
use App\OfferItem;
use App\Repository\DiscountByBrandRepository;

final class OfferService
{

    private $offerRepository;
    private $productRepository;

    public function __construct(
        OfferRepository $offerRepository , 
        ProductRepository $productRepository, 
        AdapterInterface $cache, 
        PartnerRepository $partnerRepository, 
        PartnerMapRepository $partnerMapRepository,
        PriceRepository $priceRepository,
        DiscountByBrandRepository $discountByBrandRepository
        )
        {
        $this->offerRepository = $offerRepository;
        $this->productRepository = $productRepository;
        $this->partnerRepository = $partnerRepository;
        $this->partnerMapRepository = $partnerMapRepository;
        $this->priceRepository = $priceRepository;
        $this->discountByBrandRepository = $discountByBrandRepository;
        $this->cache = $cache;
    }

    public function isOurPrice($priceId){
        return ($priceId==187||$priceId==305||$priceId==336||$priceId==445||$priceId==463)?true:false;
    }

    public function getOffers(int $productId):array
    {
        $product =  $this->productRepository->find($productId);
        $products =  $this->productRepository->findByCrossGroupId($product);
        foreach($products as $product){
            $offers = $this->offerRepository->findOfferByProduct($product);
            foreach($offers as $offer){
                $r[] = $offer;
            }
        }

        return $r;
    }

    public function getFromTo(Partner $partnerCustomer, Partner $partnerPrice){
        return $this->partnerMapRepository->findOneBy(['partnerIdFrom'=>$partnerPrice->getId(), 'partnerIdTo'=>$partnerCustomer->getId()]);
    }

    public function recalculateOfferPrice(Offer $offer,Customer $customer){


        $discountCommon = $customer->getDiscountType()->getCoef();
        $partnerId = $customer->getBranchId();
        $partner = $this->partnerRepository->find($partnerId);

        if($offer->getPriceListStatusCode()=='Wk'&&$offer->getPrice()>0&&$offer->getRest()>0){


            $discountByBrand = $this->discountByBrandRepository->findOneBy(['customer'=>$customer, 'brand'=>$offer->getProduct()->getBrand(), 'active'=>true]);
            
            if($discountByBrand){
                $discountCommon = $discountByBrand->getDiscountType()->getCoef();
            }


            $price = $offer->getPrice();
            $offerOurSklad = $this->offerRepository->findOneBy(['product'=> $offer->getProduct(), 'price'=>$this->priceRepository->find(187)]);

            if($offerOurSklad){
                $offerOurSkladPrice = ($offerOurSklad->getPrice())? $offerOurSklad: $offerOurSklad->getMinPrice();
                $price = ($price<$offerOurSkladPrice)? $offerOurSkladPrice : $price;
            }

            $pricePartnerId = $this->partnerRepository->find($offer->getPriceList()->getPartnerId());
            $pricePartner = $this->partnerRepository->find($pricePartnerId);
            $fromTo = $this->getFromTo($partner, $pricePartner);
            
            $partnerCoef = ($fromTo)? $fromTo->getCoef() : 1;
            $offerSrok = ($fromTo)? $fromTo->getSrok()+$offer->getPriceList()->getDeliveryDays() : $offer->getPriceList()->getDeliveryDays();

            $discountForPosition = (!$this->isOurPrice($offer->getPriceList()->getId())&&$discountCommon<1)?1:$discountCommon;
            $priceCalculated = $price*$partnerCoef*$discountForPosition;
            $priceCalculated = ($offer->getMinPrice()>$priceCalculated)? ceil($offer->getMinPrice()) : ceil($priceCalculated);


            $offerItem = new OfferItem;
            
            $offerItem->setPriceList($offer->getPriceList());
            $offerItem->setProduct($offer->getProduct());
            $offerItem->setPriceCalculated($priceCalculated);
            $offerItem->setPrice($offer->getPrice());
            $offerItem->setMinPrice($offer->getMinPrice());
            $offerItem->setRest($offer->getRest());
            $offerItem->setId($offer->getId());
            $offerItem->setSrok($offerSrok);


            return $offerItem;

        }
    }

    public function getOneOffer(int $offerId)
    {
        $offer =  $this->offerRepository->find($offerId);
        return $offer;
    }

    //  IT IS A Fuckin shit, Сортировка из старого сайта, нужна только для порядковой записи в hstry.hit_offer, 
    //  потому что много sql который берет по min(id) цену пробоя
    public function sortOffers(array $offers){
        if($offers){


            foreach ($offers as $k => $v) {
                $v->setKey(md5($v->getBrand().'_'.$v->getOem()));
                $key = $v->getProductId();
                $key = $v->getKey();
                $tmp_arr[$key][] = $v;
            }
            foreach ($tmp_arr as $k => $v) {
                $tmp['srok'] = null;
                $tmp['price'] = null;
                foreach ($v as $kv => $vv) {
                    $tmp['srok'][] = $vv->getSrok();
                    $tmp['price'][] = $vv->getPriceCalculated();
                }
                array_multisort($tmp['srok'], SORT_ASC, $tmp['price'], SORT_ASC, $tmp_arr[$k]);
    
                //$tmp_arr[$k][0]->visible = true;
                //$tmp_arr[$k][0]->min_srok_product = true;
                //array_keys($tmp_arr[$k], min($tmp_arr[$k]))[0];
    
                $tmp['gsrok'][] = $tmp_arr[$k][0]->getSrok();
                $tmp['gprice'][] = $tmp_arr[$k][0]->getPriceCalculated();
            }
            array_multisort($tmp['gsrok'], SORT_ASC, $tmp['gprice'], SORT_ASC, $tmp_arr);
    
            $min_price = 99999*99999;
            $id_min_price_all = null;
            foreach ($tmp_arr as $k => $v) {
                $id_min_price = null;
                $min_price_group = 99999*99999;
                foreach ($v as $kv => $vv) {
                    $vv->getPriceCalculated();
                    if ($min_price_group > $vv->getPriceCalculated()){
                        $min_price_group = $vv->getPriceCalculated();
                        $id_min_price = $kv;
                    }
                    if ($min_price > $vv->getPriceCalculated()){
                        $min_price = $vv->getPriceCalculated();
                        $id_min_price_all = [$k,$kv];
                    }
                }
                if($id_min_price){$tmp_arr[$k][$id_min_price]->visible = true; $tmp_arr[$k][$id_min_price]->min_price_product = true; }
            }
            if($id_min_price_all){$tmp_arr[$id_min_price_all[0]][$id_min_price_all[1]]->min_price_cross = true;}
    
    
            foreach ($tmp_arr as $k => $v) {
                $h = 0;
                foreach ($v as $kv => $vv) {
                    if(!isset($tmp_arr[$k][$kv]->visible)){
                        $h++;
                    }
    
                }
                foreach ($v as $kv => $vv) {
                    //$tmp_arr[$k][$kv]->hidden_offer_count = $h;
                }
            }
    
            foreach ($tmp_arr as $k => $v) {
                foreach ($v as $kv => $vv) {
                    $offers_sorted[] = $tmp_arr[$k][$kv];
                }
            }
    
            }else{
                $offers_sorted = [];
            }
    
    
            //echo "<script>console.log('".json_encode($offers_sorted)."')</script>";
    
            return $offers_sorted;
    }

    
}