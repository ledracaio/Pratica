<?php
include_once '../models/Avaliacao.php';

class AvaliacaoController {
    private $avaliacao;

    public function __construct($dbConnection) {
        $this->avaliacao = new Avaliacao($dbConnection);
    }

    public function inserir($id_pergunta, $resposta, $feedback) {
        return $this->avaliacao->inserir($id_pergunta, $resposta, $feedback);
    }

    public function listar() {
        return $this->avaliacao->listar();
    }

    public function saveFeedback($respostas, $feedback) {
        $avaliacao = new Avaliacao($this->conn);
        foreach ($respostas as $id_pergunta => $resposta) {
            $avaliacao->save($id_pergunta, $resposta, $feedback);
        }
        return true;
    }
}
?>
