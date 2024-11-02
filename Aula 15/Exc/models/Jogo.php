<?php 
    require_once "Gol.php";

    class Jogo {
        private $timeA;
        private $timeB;
        private $tempo;
        private $gols;

        public function setTimes($timeA,$timeB) {
            $this->timeA = $timeA;
            $this->timeB = $timeB;
        }
        public function addGol($time,$jogador,$tempo) {
            $gol = new Gol();
            $gol->setTempo($tempo);
            $gol->setJogador($jogador);
            $gol->setTime($time);

            array_push($this->gols, $gol);
        }
    }
?>  