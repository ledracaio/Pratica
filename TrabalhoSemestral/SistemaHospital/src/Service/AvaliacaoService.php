<?php
namespace Src\Service;

use Src\Entity\Avaliacao;
use Src\Entity\Resposta;

class AvaliacaoService {
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function salvarAvaliacao($dados) {
        $avaliacao = new Avaliacao();
        $avaliacao->setSetorId($dados['setor_id']);
        $avaliacao->setFeedbackGeral($dados['feedback'] ?? null);
        $avaliacao->setData(new \DateTime());
    
        foreach ($dados['respostas'] as $perguntaId => $resposta) {
            $respostaObj = new Resposta();
            $respostaObj->setAvaliacao($avaliacao);
            $respostaObj->setPergunta($this->entityManager->getReference('Src\Entity\Pergunta', $perguntaId));
            $respostaObj->setNota($resposta['nota']);
            $respostaObj->setFeedback($resposta['feedback'] ?? null);
    
            $this->entityManager->persist($respostaObj);
        }
    
        $this->entityManager->persist($avaliacao);
        $this->entityManager->flush();
    }
    
}
