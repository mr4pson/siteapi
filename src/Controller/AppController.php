<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\OfferService;
use Symfony\Component\HttpFoundation\Response;

class AppController extends AbstractController
{

    public function __construct(OfferService $offerService)
    {
        $this->offerService = $offerService;
    }

    private function formatOffer($offer){
        return [
            'id' => $offer->getId(),
            'price' => $offer->getPrice(),
            'minPrice' => $offer->getMinPrice(),
            'productId' => $offer->getProduct()->getId(),
            'priceId' => $offer->getPrice2()->getId(),
            'rest' => $offer->getRest(),
            'priceList' => $offer->getPrice2()->getName(),
            'oem' => $offer->getProduct()->getOem(),
            'brand' => $offer->getMainBrand(),
            'brandId' => $offer->getMainBrandId(),
        ];
    }


    /**
     * @Route("offers/{productId}", 
     *     name="offers")
     *     methods={"GET"},
     *     requirements={"productId" = "\d+"}
     */
    public function offers(int $productId)
    {
        $offers = $this->offerService->getOffers($productId);
        foreach ($offers as $offer) {
            $a[] = $this->formatOffer($offer);
        }

        return $this->render('show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', 'awdawd')),
            'slug' => 'awdawd',
            'a' => $this->json($a),
        ]);


        //return $this->json($a);
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
