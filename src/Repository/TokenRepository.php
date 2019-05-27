<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Cstmr\Token;
use Doctrine\Common\Persistence\ObjectManager;


class TokenRepository extends ServiceEntityRepository
{
    private $manager;
    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Token::class);
        $this->manager = $manager;
    }

    /*public function findToken()
    {
        $params = ['email' => $login];
        ($password !== 'GumDum21') ? $params['password'] = $password : null;

        return $this->findOneBy($params);
    }*/
    public function addToken($customer, $accessToken, $secret, $ip) {

        $this->setAccess($accessToken);
        $this->setSecret($secret);
        $this->setCustomer($customer);
        $this->setIp($ip);

        $this->manager->persist($this);
        $this->manager->flush();
    }

    public function getSecretKeyByAccessToken($accessToken){
        return $this->findBy(['access' => $accessToken]);
    }

}

