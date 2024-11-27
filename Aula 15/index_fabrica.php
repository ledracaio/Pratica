<?php

    require_once "lib/htmlTable.php";
    require_once "lib/htmlElement.php";

    $table = new htmlTable();
    $table->setId("idTabela1");
    $table->setName("nameTabela1");
    $table->setNumColunas(5);
    $table->setNumLinhas(4);
    $table->setStyle("border: 1px solid black");

    $input = new htmlInput();
    $input->setId("idInput1");
    $input->setName("nameInput1");
    $input->setStyle("border: 1px solid black");
    $input->setTitulo("Senha");
    $input->setValorDefault("1234");

    echo $table->renderHtml();

?>