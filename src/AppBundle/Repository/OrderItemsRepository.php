<?php

namespace AppBundle\Repository;

use AppBundle\Entity\OrderItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OrderItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderItems[]    findAll()
 * @method OrderItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderItems::class);
    }

    // /**
    //  * @return OrderItems[] Returns an array of OrderItems objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderItems
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
