<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use App\Service\CustomerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\RestResponseService;
use App\Service\TokenService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Psr\Log\LoggerInterface;

class AuthController extends AbstractController
{

    public function __construct(TokenService $tokenService, CustomerService $customerService, RequestStack $request, RestResponseService $restResponseService, LoggerInterface $logger)
    {
        //parent::__construct($request, $restResponseService, $logger);
        $this->tokenService = $tokenService;
        $this->customerService = $customerService;
        $this->restResponseService = $restResponseService;
        $this->logger = $logger;
    }

    private function formatAuth($customer, $secret, $accessToken){
        return [
            "secret" => $secret,
            "access" => $accessToken,
            "id" => $customer->getId(),
        ];
    }

    /**
     * @Route("auth", 
     *     name="auth")
     *     methods={"POST"}
     */
    public function auth(Request $request)
    {
        $response = new Response();
        $login = !empty($request->query->get('login')) ? $request->query->get('login') : '';
        $password = $request->query->get('password')  ? $request->query->get('password') : '';
        $customer = $this->customerService->getCustomerByLogin($login, $password);

        if (!empty($customer)) {
            $accessToken = md5($login . ':'. $password . time() . 'access');
            $secret = md5($login . ':'. $password . time() . 'secret');
            $this->tokenService->createToken($customer, $accessToken, $secret, $_SERVER['REMOTE_ADDR']);
        }

        return $this->restResponseService->response([
            'customerId' => $customer->getId(), 
            'secret' => $secret, 
            'access' => $accessToken
        ]);

        /*return $this->render('show.html.twig', [
            'a' => $this->json(
                $this->formatAuth()
            ),
        ]);*/
    }

}
