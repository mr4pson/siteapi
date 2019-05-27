<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Service\BasketService;
use App\Service\RestResponseService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ordr\Basket;
use App\Entity\Ordr\Item;
use App\BasketItem;

class BasketController extends RestController
{
    private $basketService;

    public function setBasketService(BasketService $basketService){
        $this->basketService = $basketService;
    }

    /**
     * @Route("/baskets", 
     *     name="getBaskets",
     *     methods={"GET"})
     */
    public function getBaskets()
    {
        $baskets = $this->basketService->getBasketsByCustomer($this->getCustomer());

       // dump($baskets);

        /*foreach($baskets as $basket){
            $this->basketService->getItemsCalculated($basket);
        }*/




        return $this->restResponseService->response(
            array_map(function (Basket $basket): array {
                return [
                    'id' => $basket->getId(),
                    'title' => $basket->getTitle(),
                    'dc' => $basket->getDc(),
                    'status' => $basket->getStatus(),
                    'active' => $basket->getActive(),
                    'items' => array_map(function (BasketItem $item): array {
                        return [
                            'id' => $item->getId(),
                            //'dc' => $item->getDc()->format('d-m-Y'),
                            //'qty' => $item->getQty(),
                            'price' => $item->getPrice(),
                            'priceCalculated' => $item->getOfferItem()->getPriceCalculated(),
                            'brand' => $item->getOfferItem()->getBrand(),
                            'oem' => $item->getOfferItem()->getOem(),
                            //'weight' => $item->getOffer()->getProduct()->getWeight()
                        ];
                    }, $this->basketService->getItemsCalculated($basket)),
                    'customerId' => $basket->getCustomer()->getId(),
                ];
            }, $baskets)
        );
    }

    /**
     * @Route("/baskets/{id}", 
     *     name="getBasket",
     *     methods={"GET"})
     */
    public function getBasket(int $id)
    {
        $response = new Response();
        $basket = $this->basketService->getBasket($id);

        return $this->restResponseService->response([
            'id' => $basket->getId(),
            'title' => $basket->getTitle(),
            'dc' => $basket->getDc(),
            'status' => $basket->getStatus(),
            'active' => $basket->getActive(),
            'items' => array_map(function (BasketItem $item): array {
                return [
                    'id' => $item->getId(),
                    //'dc' => $item->getDc()->format('d-m-Y'),
                    'qty' => $item->getQty(),
                    'rest' => $item->getRest(),
                    'price' => $item->getPrice(),
                    'priceCalculated' => $item->getOfferItem()->getPriceCalculated(),
                    'brand' => $item->getOfferItem()->getBrand(),
                    'oem' => $item->getOfferItem()->getOem(),
                    //'weight' => $item->getOffer()->getProduct()->getWeight()
                ];
            }, $this->basketService->getItemsCalculated($basket))
        ]);
    }

    /**
     * @Route("/activeBasket", 
     *     name="getActiveBasket",
     *     methods={"GET"})
     */
    public function getActiveBasket()
    {

        $basket = $this->basketService->getActiveBasket($this->getCustomer());

        return $this->restResponseService->response([
            'id' => $basket->getId(),
            'title' => $basket->getTitle(),
            'dc' => $basket->getDc(),
            'status' => $basket->getStatus(),
            'active' => $basket->getActive(),
            'customerId' => $basket->getCustomer()->getId(),
        ]);
    }

    /**
     * @Route("/baskets", 
     *     name="createBasket",
     *     methods={"POST"})
     */
    public function createBasket()
    {

        $data = [
            'title' =>  $this->getParam('title'),
            'status' => '1',
            'active' => false,
            'customer' => $this->getCustomer()
        ];

        $basket = $this->basketService->createBasket($data);

        return $this->restResponseService->response([
            'id' => $basket->getId()
        ]);
    }

    /**
     * @Route("/baskets/{id}", 
     *     name="updateBasket",
     *     methods={"PUT"},
     *     requirements={"id" = "\d+"})
     */
    public function updateBasket(int $id)
    {
     
        $data = [
            'title' => $this->getParam('title')
        ];
        $basket = $this->basketService->updateBasket($id, $data);

        return $this->restResponseService->response([
            'id' => $basket->getId()
        ]);
    }
}
