<?php

namespace App\Repository;

use App\Entity\ClientLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientLocation[]    findAll()
 * @method ClientLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientLocation::class);
    }

    // /**
    //  * @return ClientLocation[] Returns an array of ClientLocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClientLocation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
