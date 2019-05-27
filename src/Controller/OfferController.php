<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Rules;
use App\Controller\RestController;
use App\Service\OfferService;
use App\Service\PartnerService;
use App\Service\CustomerService;
use App\Service\HitService;
use App\OfferItem;
use App\Service\ProductService;

class OfferController extends RestController
{
    private $offerService;
    private $customerService;
    private $partnerService;
    private $hitService;
    private $productService;

    public function setServices(OfferService $offerService, PartnerService $partnerService, CustomerService $customerService, HitService $hitService, ProductService $productService){
        $this->offerService = $offerService;
        $this->partnerService = $partnerService;
        $this->customerService = $customerService;
        $this->hitService = $hitService;
        $this->productService = $productService;
    }
     /**
     * @Route("offers/findByOem/{search}", 
     *     name="findByOem")
     *     methods={"GET"},
     *     
     * @Rules(role={"ADMIN","USER"})
     */
    public function findByOem(string $search)
    {
        $results = $this->productService->findByOem($search);

        $hit = $this->customerService->getHitRepository()->addHitText(
            $this->getCustomer()->getId(),
            $search
        );

        $data = array_map(function ($item): array {
            return [
                'oem' => $item->getOem(),
                'brand' => $item->getBrand()->getCode(),
                'id' => $item->getId()
                //'weight' => $item->getOffer()->getProduct()->getWeight()
            ];
        }, $results);
        return $this->restResponseService->response(['results'=>$data, 'hitId'=>$hit->getId()]);
    }

    /**
     * @Route("offers/{id}", 
     *     name="OfferList")
     *     methods={"GET"},
     *     requirements={"id" = "\d+"}
     * @Rules(role={"ADMIN","USER"})
     */
    public function offers(int $id)
    {
        
        $canDoHit = $this->customerService->canDoHit($this->getCustomer());
        $offers = ($canDoHit)? $this->offerService->getOffers($id) : null ;
        
        if($this->getParam('hitId')){
            $hitId = $this->getParam('hitId');
            $hit = $this->customerService->getHitRepository()->find($hitId);
            $hit = $this->customerService->getHitRepository()->updateHit(
                $hit,
                $id
            );
        }else{
            $hit = $this->customerService->getHitRepository()->addHit(
                $id,
                $this->getCustomer()->getId()
            );
        }


       

        (!$canDoHit)?$this->restResponseService->error('Limit or access','Обратитесь к Вашему менеджеру'):null;
        (!$offers)?$this->restResponseService->error('no offers','По данному продукту нет предложений'):null;


        if($offers&&count($offers)>0){
            foreach ($offers as $k=>$offer) {


                if($offer->getPriceListStatusCode()=='Wk'&&$offer->getPrice()>0&&$offer->getRest()>0){
                    $offersArray[] = $this->offerService->recalculateOfferPrice($offer, $this->getCustomer());
                }
 
                /*if($offer->getPriceList()->getStatus()->getCode()=='Wk'&&$offer->getPrice()>0&&$offer->getRest()>0){


                    $this->logger->info('price calculate for offerId = '.$offer->getId(), 
                        [
                            'Коэф между локациями'=>$partnerCoef,
                            'Коэф клиента'=>$discountCommon, 
                            'Прайс наш?'=>$this->offerService->isOurPrice($offer->getPriceList()->getId()),
                            'Цена исходная'=>$offer->getPrice(),
                            'Цена минимальная'=>$offer->getPrice(),
                            'Цена для клиента'=>$priceCalculated,
                        ]
                    );


                }*/
            }

            $offersArray = $this->offerService->sortOffers($offersArray);

            foreach($offersArray as $offerItem){
                //$offer = $offers[$item-getKey()];
                $hitOffer = $this->customerService->getHitOfferRepository()->add(
                    $hit,
                    $offerItem
                );
                $hit->addHitOffer($hitOffer);
                              

                $json[] = $offerItem->getArray();

            }

            $this->customerService->getHitRepository()->save($hit);  
        }

        //return $this->restResponseService->response(['offers'=>$json, 'hitId'=>$hit->getId()]);

        return $this->render('show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', 'awdawd')),
            'slug' => 'awdawd',
            'a' => $this->json($json),
        ]);

    }


    /**
     * @Route("offer/{offerId}", 
     *     name="offer")
     *     methods={"GET"},
     *     requirements={"offerId" = "\d+"}
     */
    public function offer(int $offerId)
    {
        $offer = $this->offerService->getOneOffer($offerId);
        $a = $this->formatOffer($offer);;

        

        return $this->json($a);
    }

}
