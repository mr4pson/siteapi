<?php

namespace App\Service;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;



class RestResponseService 
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
       $this->logger = $logger;
    }

    public function response(array $data){
        $this->logger->debug('An error occurred');
        $response = new Response(json_encode( ['response'=>['error'=>false,'data' => $data]],JSON_UNESCAPED_UNICODE));
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;        
    }
    public function error($errorMessage, $errorDescription=null){

        $this->logger->error('An error occurred');

        $response = new Response(json_encode( ['response'=>['error'=>true,'errorMessage' => $errorMessage,'errorDescription' => $errorDescription]],JSON_UNESCAPED_UNICODE));
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        $response->send();
        die();
    }

}
