<?php

    require_once "model\Computador.php";

    $calculadora = new app\model\Computador;
    $calculadora->ligar();
    $calculadora->desligar();

    echo $calculadora->getStatus();

?>