<?php

namespace app\model;

class Calculadora {

    private $n1;
    private $n2;

    public function setNumero1($n) {
        $this->n1 = $n;
    }

    public function setNumero2($n) {
        $this->n2 = $n;
    }

    public function soma() {
        return $this->n1 + $this->n2;
    }

    public function subtrair() {
        return $this->n1 - $this->n2;
    }

    public function multiplicar() {
        return $this->n1 * $this->n2;
    }

    public function divisao() {
        if ($this->n2 == 0) {
            echo 'Não é possivel realizar divisões por 0';
        } else {
            return $this->n1 / $this->n2;
        }
        
    }
}

?>
