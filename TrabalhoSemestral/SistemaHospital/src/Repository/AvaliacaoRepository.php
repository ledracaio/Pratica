<?php
namespace Src\Repository;

use Doctrine\ORM\EntityRepository;

class AvaliacaoRepository extends EntityRepository {
    public function buscarPorSetor() {
        // Exemplo de consulta customizada
        return $this->createQueryBuilder('a')
            ->select('IDENTITY(a.setorId) AS setor, COUNT(a.id) AS total, AVG(a.respostas) AS media')
            ->groupBy('a.setorId')
            ->getQuery()
            ->getResult();
    }
}
