<?php

namespace app\model;

class Computador {

    private $status;

    private function printStatus() {
        echo $this->getStatus();
    }

    public function ligar() {
        $this->status = 'Ligado';
        $this->printStatus();
    }

    public function desligar() {
        $this->status = 'Desligado';
        $this->printStatus();
    }

    public function getStatus() {
        return $this->status;
    }
}

?>
