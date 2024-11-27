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
        include_once __DIR__ . "/../View/Formulario/index.php";
    }

    public function salvarAvaliacao($dados) {
        $this->avaliacaoService->salvarAvaliacao($dados);
        header("Location: /obrigado.php");
        exit();
    }
}
