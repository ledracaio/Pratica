<?php

    class htmlTable extends htmlElement
    {
        private $numColunas;
        private $numLinhas;

        public function setNumColunas($numColunas) {
            $this->numColunas = $numColunas;
        }

        public function setNumLinhas($numLinhas) {
            $this->numLinhas = $numLinhas;
        }

        public function renderHtml() {
            $html = "<table>" .
                    $this->getTableBody() .
                    "</table>";
            return $html;
        }

        private function getTableBody() {
            $html = "<tbody>";
            for($i = 0; $i < $this->numLinhas; $i++) {
                $html .= "<tr>";
                for($j = 0; $j < $this->numColunas; $j++) {
                    $html .= "<td>$i -> $j</td>";
                }
                $html .= "</tr>";
            }
            $html .= "</tbody>";
            return $html;
        }
    }
    

?>