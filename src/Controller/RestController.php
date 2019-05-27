<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use App\UserProvider;
use App\Service\TokenService;
use App\Service\RestResponseService;
use Psr\Log\LoggerInterface;
use App\Service\CustomerService;

class RestController extends AbstractController
{

    public $restResponseService;
    public $logger;
    private $user;
    private $customer;
    private $customerService;
    private $params;

    public function __construct(
            RequestStack $request,
            RestResponseService $restResponseService, 
            TokenService $tokenService,
            LoggerInterface $logger,
            CustomerService $customerService
        ){

        $this->restResponseService = $restResponseService;
        $this->customerService = $customerService;
        $this->logger = $logger;

        $r = $request->getCurrentRequest();
        $id = $r->get('id');
        $params = $r->get('params');
        //dump($params);
        $this->params = json_decode($params,true);
        //dump($this->params);
        $signature = $r->get('signature');
        $customerId = (int) $r->get('customerId');
        $accessToken = $r->get('accessToken');
        
        (!$accessToken)? $this->restResponseService->error('accessToken required') :null;
        (!$signature)? $this->restResponseService->error('signature required'):null;

        // из бд берем secretToken по accessToken 
        $data = $tokenService->getSecretKeyByAccessToken($accessToken)[0];
        $secretToken = $data->getSecret();
       
        // создаем сигнатуру из параметров
        $signature2 = md5($id.$params.$secretToken);
        
        
        
        
        //dump($signature2);
        // проверяем совпадает ли подпись
        
        if($signature==$signature2){
            // получаем пользователя, а дальше по роуту внутри дочернего контроллера
            // получаем по ключу из doctrine и записываем в класс, чтобы был доступен внутри дочерних контроллеров
           

            if($customerId){
                $this->user = $data->getCustomer();
                $this->customer = $this->customerService->getCustomerById($customerId);
            }else{
                $this->user = null;
                $this->customer = $data->getCustomer();
            }

        }else{
            $this->restResponseService->error('bad signature','Подпись сформирована неверно');
        }


        dump([
            'signature_real'=>$signature2,
            'signature_get'=>$signature,
            'secret'=>$secretToken,
            'userId'=>$this->user,
            'customerId'=>$this->customer,
            'params'=>$this->params,

        ]);


        $s = ['ADMIN','USER'];
        $role = $s[rand(0,count($s)-1)];

        UserProvider::$user = $role;
    }
    public function getParam(string $key){
        return ($this->params[$key]) ? $this->params[$key] : null;
    }
    public function getParams(){
        return $this->params;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getUser(){
        return $this->user;
    }
}
