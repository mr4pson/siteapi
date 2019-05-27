<?php

namespace App;


class BasketItem
{
    private $id;
    private $priceCalculated;
    private $minPrice;
    private $price;
    private $rest;
    private $priceList;
    private $product;
    private $srok;
    private $qty;
    private $offerItem;

    public function setQty($value){
        $this->qty = $value;
    }
    public function setOfferItem($value){
        $this->offerItem = $value;
    }
    public function setPriceList($priceList){
        $this->priceList = $priceList;
    }
    public function setProduct($product){
        $this->product = $product;
    }
    public function setPriceCalculated($value){
        $this->priceCalculated = $value;
    }
    public function setPrice($value){
        $this->price = $value;
    }
    public function setMinPrice($value){
        $this->minPrice = $value;
    }
    public function setRest($value){
        $this->rest = $value;
    }
    public function setSrok($value){
        $this->srok = $value;
    }
    public function setId($value){
        $this->id = $value;
    }

    public function getOfferItem(){
        return $this->offerItem;
    }
    public function getPriceList(){
        return $this->priceList;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getPriceCalculated(){
        return $this->priceCalculated;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getMinPrice(){
        return $this->minPrice;
    }
    public function getRest(){
        return $this->rest;
    }
    public function getId(){
        return $this->id;
    }
    public function getQty(){
        return $this->qty;
    }
    public function getSrok(){
        return $this->srok;
    }

    public function getOem(){
        return $this->getProduct()->getOem();
    }
    public function getBrand(){
        return $this->getProduct()->getBrand()->getCode();
    }
    public function getProductId(){
        return $this->getProduct()->getId();
    }



    public function getArray(){
        return [
            'oem'=>$this->getOem(),
            'brand'=>$this->getBrand(),
            'priceCalculated'=>$this->getPriceCalculated(),
            
        ];
    }




    

}
