<?php
 
namespace App\Repository;
 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\Ordr\Order;
use App\Entity\Cstmr\Customer;
use App\Entity\Ordr\Address;
use Doctrine\Common\Persistence\ObjectManager;

class OrderRepository extends ServiceEntityRepository
{
    private $manager;
    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Order::class);
        $this->manager = $manager;
    }

    
    public function getOrdersByCustomer(Customer $customer)
    {
        $orders = $this->findBy([
            'customer' => $customer
        ]);
        
        return $orders;
    }

    public function getOrder(int $id)
    {
        $order = $this->find($id);
        
        return $order;
    }

    public function createOrder(array $data)
    {
        $order = new Order();

        $order->setComment($data['comment']);
        $order->setCompanyId($data['companyId']);
        $order->setCustomer($data['customer']);
        $order->setParent($data['parent']);
        $order->setDc(new \DateTime("now"));
        $order->setDm(new \DateTime("now"));
        $order->setBranch($data['branch']);

        $this->manager->persist($order);
        $this->manager->flush();

        return $order;
    }

    public function updateOrder(array $data)
    {
        $order = new Order();

        $order->setComment($data['comment']);
        $order->setCompanyId($data['companyId']);
        $order->setCustomer($data['customer']);
        $order->setParent($data['parent']);
        $order->setDm(new \DateTime("now"));

        $this->manager->persist($order);
        $this->manager->flush();

        return $order;
    }
}

