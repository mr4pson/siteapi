<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Mngr\Branch;
use Doctrine\Common\Persistence\ObjectManager;

class BranchRepository extends ServiceEntityRepository
{
    private $manager;
    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Branch::class);
        $this->manager = $manager;
    }

    public function getBranch(int $id): ?Branch
    {
        $branch = $this->find($id);
        
        return $branch;
    }
}

