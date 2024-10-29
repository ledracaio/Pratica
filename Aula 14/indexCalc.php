<?php

    require_once "model\Calculadora.php";

    $calculadora = new app\model\Calculadora;
    $calculadora->setNumero1(5);
    $calculadora->setNumero2(4);

    echo $calculadora->soma();

?>