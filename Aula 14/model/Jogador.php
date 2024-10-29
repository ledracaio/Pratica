<?php

namespace app\model;

class Jogador {

    private $nome;
    private $posicao;
    private $dataNasc;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPosicao($posicao) {
        $this->posicao = $posicao;
    }

    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }
}
?>
