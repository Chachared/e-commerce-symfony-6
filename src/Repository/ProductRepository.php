<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findByPagination($currentPage, $nbResults){
        return $this->createQueryBuilder('p')
            ->setMaxResults($nbResults)
            ->setFirstResult(($currentPage*$nbResults)-$nbResults)
            ->getQuery()->getResult();
        
    }
    public function search($filters){
        $query = $this->createQueryBuilder('p')->leftJoin('p.category','category')->leftJoin('p.brand','brand');
        
        if(!is_null($filters['searchBar'])){
            $query -> where('p.title LIKE :research')
                -> orWhere('p.description LIKE :research')
                -> orWhere('category.name LIKE :research')
                -> setParameter('research', '%'.$filters['searchBar'].'%');
        }

        if(!is_null($filters['category'])){
            $query -> andWhere('category.id LIKE :research')
                -> setParameter('research', $filters['category']);
        }

        

        if(!is_null($filters['brand'])){
            $query -> andWhere('brand.id LIKE :research')
                -> setParameter('research', $filters['brand']);
        }

        if(!empty($filters['stars'])){
            $query -> andWhere('p.stars IN (:array)')
                -> setParameter('array', $filters['stars']);
        }

        if(!is_null($filters['minPrice'])){
            $query -> andWhere('p.HT_price > :research')
                -> setParameter('research', $filters['minPrice']);
        }

        if(!is_null($filters['maxPrice'])){
            $query -> andWhere('p.HT_price < :research')
                -> setParameter('research', $filters['maxPrice']);
        }

        return $query->getQuery()->getResult();
    }
    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}