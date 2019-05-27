<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use App\Service\CustomerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use App\Service\CustomerService;
use App\Service\RestResponseService;
use App\Service\TokenService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Psr\Log\LoggerInterface;

class CustomerController extends RestController
{

    public function __construct(TokenService $tokenService, CustomerService $customerService, RequestStack $request, RestResponseService $restResponseService, LoggerInterface $logger)
    {
        //parent::__construct($request, $restResponseService, $logger);
        $this->tokenService = $tokenService;
        $this->customerService = $customerService;
        $this->restResponseService = $restResponseService;
        $this->logger = $logger;
    }

    /**
     * @Route("customer", 
     *     name="customer")
     *     methods={"POST"}
     */
    public function auth(Request $request)
    {
        $response = new Response();
        $login = !empty($request->query->get('login')) ? $request->query->get('login') : '';
        $password = $request->query->get('password')  ? $request->query->get('password') : '';

        //dump($accessToken, $secret);

        $customer = $this->customerService->getCustomerByLogin($login, $password);

        if (!empty($customer)) {
            $accessToken = md5($login . ':'. $password . time() . 'access');
            $secret = md5($login . ':'. $password . time() . 'secret');
            $this->tokenService->createToken($customer, $accessToken, $secret, $_SERVER['REMOTE_ADDR']);
            //var_dump();die;
        }

        return $this->render('show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', 'awdawd')),
            'slug' => 'awdawd',
            'a' => $this->json([
                "secret" => $secret,
                "access" => $accessToken,
                "id" => $customer->getId(),
                "dc" => $customer->getDc(),
                "dm" => $customer->getDm(),
                "name" => $customer->getName(),
                "secondName" => $customer->getSecondName(),
                "lastName" => $customer->getLastName(),
                "email" => $customer->getEmail(),
                "phone" => $customer->getPhone(),
                "maxQueryCount" => $customer->getMaxQueryCount(),
                "queryByDay" => $customer->getQueryByDay(),
                "lastQueryDt" => $customer->getLastQueryDt(),
                "active" => $customer->getActive(),
                "login" => $customer->getLogin(),
                "password" => $customer->getPassword(),
                "dl" => $customer->getDl(),
                "de" => $customer->getDe(),
                "smartPrice" => $customer->getSmartPrice(),
                "lat" => $customer->getLat(),
                "lon" => $customer->getLon(),
                "phoneWork" => $customer->getPhoneWork(),
                "address" => $customer->getAddress(),
                "info" => $customer->getInfo(),
                "apm" => $customer->getApm(),
                "branchId" => $customer->getBranchId(),
                "deliveryFree" => $customer->getDeliveryFree(),
                "df" => $customer->getDf(),
                "bxId" => $customer->getBxId(),
                "visible" => $customer->getVisible(),
                "bxLeadId" => $customer->getBxLeadId(),
                "bxManagerId" => $customer->getBxManagerId(),
                "userId" => $customer->getUserId(),
                "isPrivatePerson" => $customer->getIsPrivatePerson(),
                "defaultRequisiteId" => $customer->getDefaultRequisiteId(),
                "discountType" => $customer->getDiscountType()->getId(),
                "company" => !empty($customer->getCompany()) ? $customer->getCompany()->getId() : null,
            ]),
        ]);
    }

}
