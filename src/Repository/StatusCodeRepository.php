<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Ordr\DOrderStatus;
use Doctrine\Common\Persistence\ObjectManager;

class StatusCodeRepository extends ServiceEntityRepository
{
    private $manager;
    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, DOrderStatus::class);
        $this->manager = $manager;
    }

    public function getStatusCode(string $code): ?DOrderStatus
    {
        $statusCode = $this->findOneBy([
            'code' => $code
        ]);
        
        return $statusCode;
    }
}

