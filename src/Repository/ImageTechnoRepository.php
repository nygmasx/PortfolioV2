<?php

namespace App\Repository;

use App\Entity\ImageTechno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageTechno>
 *
 * @method ImageTechno|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageTechno|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageTechno[]    findAll()
 * @method ImageTechno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageTechnoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageTechno::class);
    }

//    /**
//     * @return ImageTechno[] Returns an array of ImageTechno objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ImageTechno
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
