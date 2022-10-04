<?php

namespace App\Repository;

use App\Entity\VaccinInjection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VaccinInjection>
 *
 * @method VaccinInjection|null find($id, $lockMode = null, $lockVersion = null)
 * @method VaccinInjection|null findOneBy(array $criteria, array $orderBy = null)
 * @method VaccinInjection[]    findAll()
 * @method VaccinInjection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VaccinInjectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VaccinInjection::class);
    }

    public function save(VaccinInjection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VaccinInjection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VaccinInjection[] Returns an array of VaccinInjection objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VaccinInjection
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
