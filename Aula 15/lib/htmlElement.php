<?php

    abstract class htmlElement
    {
        private $name;
        private $id;
        private $style;

        abstract function renderHtml();

        public function setName($name) {
            $this->name = $name;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setStyle($style) {
            $this->style = $style;
        }
    }
    

?>