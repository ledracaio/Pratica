<?php

    require_once "model\Pessoa.php";
    require_once "model\Contato.php";
    require_once "model\Endereco.php";

    $pessoa = new app\model\Pessoa;
    $pessoa->setNome("Caio");
    $pessoa->setSobreNome("Ledra");
    $pessoa->setDataNascimento(new DateTime("2003-07-21"));
    $pessoa->setCpfCnpj("000.000.000-00");

    //Contatos
    $pessoa->getTelefone()->setTipo(1);
    $pessoa->getTelefone()->setNome("Telefone Celular");
    $pessoa->getTelefone()->setValor("00000-0000");

    //Endereco
    $pessoa->getEndereco()->setLogradouro("Rua Logradouro 01");
    $pessoa->getEndereco()->setBairro("Bairro 01");
    $pessoa->getEndereco()->setCidade("Cidade 01");
    $pessoa->getEndereco()->setEstado("Estado 01");
    $pessoa->getEndereco()->setCep("00000-000");

    echo $pessoa->getNomeCompleto();

?>