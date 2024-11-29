<?php
namespace Src\Controller;

use Src\Repository\PerguntaRepository;
use Src\Service\AvaliacaoService;

class FormularioController {
    private $perguntaRepository;
    private $avaliacaoService;

    public function __construct($entityManager) {
        $this->perguntaRepository = $entityManager->getRepository('Src\Entity\Pergunta');
        $this->avaliacaoService = new AvaliacaoService($entityManager);
    }

    public function exibirFormulario() {
        $perguntas = $this->perguntaRepository->buscarAtivas();
        if (empty($perguntas)) {
            // Tratar caso não haja perguntas ativas
            echo "Nenhuma pergunta ativa encontrada.";
            exit;
        }
        include_once __DIR__ . "/../View/Formulario/index.php";
    }
    

    public function salvarAvaliacao($dados) {
        if (!isset($dados['respostas']) || empty($dados['respostas'])) {
            throw new \Exception("Respostas não fornecidas.");
        }
        
        // Verificar se as respostas possuem perguntas válidas
        foreach ($dados['respostas'] as $perguntaId => $resposta) {
            if ($perguntaId <= 0) {
                throw new \Exception("ID de pergunta inválido: $perguntaId");
            }
        }
    
        $respostasFormatadas = [];
        foreach ($dados['respostas'] as $perguntaId => $resposta) {
            $respostasFormatadas[] = [
                'pergunta_id' => $perguntaId,
                'nota' => $resposta['nota'],
                'feedback' => $resposta['feedback'] ?? null
            ];
        }
    
        $dados['respostas'] = $respostasFormatadas;
        $this->avaliacaoService->salvarAvaliacao($dados);
        
        header("Location: /obrigado.php");
        exit();
    }
    
    
}
