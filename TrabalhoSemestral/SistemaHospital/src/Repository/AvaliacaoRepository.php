<?php
namespace Src\Repository;

use Doctrine\ORM\EntityRepository;

class AvaliacaoRepository extends EntityRepository {
    public function buscarPorSetor() {
        return $this->createQueryBuilder('a')
            ->select('IDENTITY(a.setorId) AS setor, AVG(r.nota) AS media')
            ->join('a.respostas', 'r')
            ->groupBy('a.setorId')
            ->getQuery()
            ->getResult();
    }
    
}
