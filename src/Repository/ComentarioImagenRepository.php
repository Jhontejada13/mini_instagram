<?php

namespace App\Repository;

use App\Entity\ComentarioImagen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;




class AlbumRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComentarioImagen::class);
    }

    

    /*
    public function findByExampleField($value)
    {
        // DQL -> Lenguaje propio de doctrine para ejecutar sentencias sql
        // $imagen_repo = $this->getDoctrine()->getRepository(Imagen::class);
        // $dql = "SELECT a FROM App\Entity\Imagen a WHERE a.nombre = 'imagen3'";
        // $query = $imagen_repo->createQuery($dql);
        // $resultset = $query->execute();
        // var_dump($resultset);

        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imagen
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}