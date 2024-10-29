<?php
namespace Models;

use Doctrine\ORM\EntityManager;

class Pergunta {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getAll() {
        // Utilize o EntityManager para buscar dados
        return $this->entityManager->getRepository(Pergunta::class)->findAll();
    }
}
?>
