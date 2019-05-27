<?php 
namespace App\Service;


use App\Repository\ProductRepository;

final class ProductService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }


    public function findByOem($text){
        return $this->productRepository->findBy(['oem'=>$text]);
    }

}