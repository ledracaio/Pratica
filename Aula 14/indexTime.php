<?php

    require_once "model\Time.php";
    require_once "model\Jogador.php";

    $time = new app\model\Time;
    $time->setNome("Unidavi FC");
    $time->SetAnoFundacao(2000);

    $jogador = new app\model\Jogador;
    $jogador->setNome("Cleber Nardelli");
    $jogador->setPosicao("Atacante");
    $jogador->setDataNasc(new DateTime("2000-01-20"));

    $time->addJogador($jogador);

    echo "<h1>".$time->getNome(). "</h1>";

    print("<pre>");
    var_dump($time->getJogadores());
    print("</pre>");

?>