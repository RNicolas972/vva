<?php

namespace App\Repository;

use App\Entity\StatusAcco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatusAcco|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusAcco|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusAcco[]    findAll()
 * @method StatusAcco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusAccoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatusAcco::class);
    }

    // /**
    //  * @return StatusAcco[] Returns an array of StatusAcco objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatusAcco
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
