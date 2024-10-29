<?php
namespace Controllers;

use Models\Pergunta;
use function getEntityManager;

class PerguntaController {
    private $pergunta;

    public function __construct() {
        $entityManager = getEntityManager();
        $this->pergunta = new Pergunta($entityManager);
    }

    public function getPerguntas() {
        return $this->pergunta->getAll();
    }
}
?>
