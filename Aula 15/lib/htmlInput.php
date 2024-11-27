<?php

    class htmlInput extends htmlElement
    {
        private $titulo;
        private $valorDefault;
        private $senha;

        private function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        private function setValorDefault($valorDefault) {
            $this->valorDefault = $valorDefault;
        }

        private function setSenha($senha) {
            $this->senha = $senha;
        }

        private function getLabel() {
            return "<label for='$this->id'>$this->titulo</label>";
        }

        public function renderHtml() {
            $html = "<input type='password'" .
                    "value='$this->valorDefault' placeholder='$this->titulo' />";
            return $html;
        }
    }
    

?>