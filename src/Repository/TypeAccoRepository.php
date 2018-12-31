<?php

namespace App\Repository;

use App\Entity\TypeAcco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAcco|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAcco|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAcco[]    findAll()
 * @method TypeAcco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAccoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAcco::class);
    }

    // /**
    //  * @return TypeAcco[] Returns an array of TypeAcco objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAcco
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
