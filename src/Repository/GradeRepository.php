<?php

namespace App\Repository;

use App\Entity\Grade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Grade>
 *
 * @method Grade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grade[]    findAll()
 * @method Grade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grade::class);
    }

    public function save(Grade $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Grade $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    
    public function addGrade(int $id_student, int $grade, int $id_classroom)
    {
        $qb = $this->createQueryBuilder('c')
            ->insert('grade')
            ->values([
                'score' => '?',
                'student_id' => '?',
                'classroom_id' => '?',
            ])
            ->setParameter([
                0 => $grade,
                1 => $id_student,
                2 => $id_classroom
            ]);
        $query = $qb->getQuery();
        return $query->execute();
    }

    public function gradeAverage(int $id)
    {
        $qb = $this->createQueryBuilder('score')
            ->where('score.id = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();
        return $query->execute();
    }

    public function gradeAverageForStudent(int $id)
    {
        $qb = $this->createQueryBuilder('score')
            ->where('score.id = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();
        return $query->execute();
    }

//    /**
//     * @return Grade[] Returns an array of Grade objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Grade
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
