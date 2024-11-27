<?php
namespace Src\Repository;

use Doctrine\ORM\EntityRepository;

class PerguntaRepository extends EntityRepository {
    public function buscarAtivas() {
        return $this->createQueryBuilder('p')
            ->where('p.ativa = :ativa')
            ->setParameter('ativa', true)
            ->getQuery()
            ->getResult();
    }
}
