<?php

namespace App\Repository;

use App\Entity\TypePraticient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypePraticient|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypePraticient|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypePraticient[]    findAll()
 * @method TypePraticient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypePraticientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypePraticient::class);
    }

    // /**
    //  * @return TypePraticient[] Returns an array of TypePraticient objects
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
    public function findOneBySomeField($value): ?TypePraticient
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
