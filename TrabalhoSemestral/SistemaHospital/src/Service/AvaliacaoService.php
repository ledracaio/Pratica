<?php
namespace Src\Service;

use Src\Entity\Avaliacao;

class AvaliacaoService {
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function salvarAvaliacao($dados) {
        $avaliacao = new Avaliacao();
        $avaliacao->setSetorId($dados['setor_id']);
        $avaliacao->setRespostas($dados['respostas']);
        $avaliacao->setFeedback($dados['feedback'] ?? null);
        $avaliacao->setData(new \DateTime());

        $this->entityManager->persist($avaliacao);
        $this->entityManager->flush();
    }
}
