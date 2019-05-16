<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\CustomerService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends AbstractController
{

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
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

        $customer = $this->customerService->getCustomer($login, $password);

        dump($customer);

        return $this->json([
            "id" => $customer->getId()
        ]);
    }

}
