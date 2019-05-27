<?php 
namespace App\Service;

use App\Repository\BasketRepository;
use App\Repository\ItemRepository;
use App\Entity\Cstmr\Customer;
use App\Entity\Ordr\Basket;
use App\Service\OfferService;
use App\BasketItem;

final class BasketService
{

    private $basketRepository;

    public function __construct(BasketRepository $basketRepository, ItemRepository $itemRepository, OfferService $offerService)
    {
        $this->basketRepository = $basketRepository;
        $this->itemRepository = $itemRepository;
        $this->offerService = $offerService;
    }

    public function getBasketsByCustomer(Customer $customer)
    {
        $baskets = $this->basketRepository->getBasketsByCustomer($customer);
        return $baskets;
    }

    public function getBasketById(Customer $customer)
    {
        $baskets = $this->basketRepository->getBasketsByCustomer($customer);
        return $baskets;
    }

    public function getActiveBasket(Customer $customer)
    {
        $basket = $this->basketRepository->getActiveBasket($customer);
        return $basket;
    }
    
    public function createBasket(array $data)
    {
        $basket = $this->basketRepository->createBasket($data);
        return $basket;
    }

    public function updateBasket(int $id, array $data)
    {
        $basket = $this->basketRepository->updateBasket($id, $data);
        return $basket;
    }

    public function getBasket(int $id)
    {
        $basket = $this->basketRepository->getBasket($id);
        return $basket;
    }

    public function getItemsCalculated(Basket $basket)
    {

        $basketItems = [];
        $items = $basket->getItems();
        foreach($items as $item){
            $offer = $item->getOffer();
            $offerItem = $this->offerService->recalculateOfferPrice($offer, $basket->getCustomer());

            if($offerItem){


                $basketItem = new BasketItem;
                $basketItem->setId($item->getId());
                $basketItem->setOfferItem($offerItem);
                $basketItem->setPrice($item->getPrice());
                $basketItem->setQty($item->getQty());
                $basketItem->setRest($offerItem->getRest());
                /*$basketItem->setProduct();
                $basketItem->setPriceCalculated($priceCalculated);
                $basketItem->setPrice($offer->getPrice());
                $basketItem->setMinPrice($offer->getMinPrice());
                $basketItem->setRest($offer->getRest());
                $basketItem->setId($offer->getId());
                $basketItem->setSrok($offerSrok);*/


                $basketItems[] = $basketItem;
            }


        }
        //dump($basketItems);




        return $basketItems;
    }
}