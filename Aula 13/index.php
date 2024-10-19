<?php

    require_once "model\pessoa.php";
    require_once "model\contato.php";
    require_once "model\endereco.php";

    $pessoa = new app\model\Pessoa;
    $pessoa->setNome("Caio");
    $pessoa->setSobreNome("Ledra");
    $pessoa->setDataNascimento(new DateTime("2003-07-21"));
    $pessoa->setCpfCnpj("097.990.769.19");

    echo $pessoa->getNomeCompleto();

?>