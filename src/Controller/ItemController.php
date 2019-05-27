<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Service\ItemService;
use App\Service\RestResponseService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ordr\Item;

class ItemController extends RestController
{
    private $basketService;

    /*public function setItemService(ItemService $itemService){
        $this->itemService = $itemService;
    }*/
}
