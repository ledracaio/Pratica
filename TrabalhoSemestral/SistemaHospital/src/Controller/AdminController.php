<?php
namespace Src\Controller;

use Src\Repository\AvaliacaoRepository;

class AdminController {
    private $avaliacaoRepository;

    public function __construct($entityManager) {
        $this->avaliacaoRepository = $entityManager->getRepository('Src\Entity\Avaliacao');
    }

    public function exibirDashboard() {
        $avaliacoes = $this->avaliacaoRepository->buscarPorSetor();
        include_once __DIR__ . "/../View/Admin/dashboard.php";
    }
}
