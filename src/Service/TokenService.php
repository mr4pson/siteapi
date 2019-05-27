<?php 
namespace App\Service;

use App\Repository\TokenRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;


final class TokenService
{

    private $offerRepository;
    private $productRepository;

    public function __construct(TokenRepository $tokenRepository, AdapterInterface $cache){
        $this->tokenRepository = $tokenRepository;
        $this->cache = $cache;
    }

    public function getSecretKeyByAccessToken($accessToken){
        return $this->tokenRepository->getSecretKeyByAccessToken($accessToken);
    }

    public function createToken($customer, $accessToken, $secret, $ip) {
        $this->tokenRepository->addToken($customer, $accessToken, $secret, $ip);
    }
    
}