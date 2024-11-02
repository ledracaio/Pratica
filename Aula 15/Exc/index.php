<?php
    require "models/Time.php";
    require "models/Jogador.php";
    require "models/Jogo.php";

    $time = new Time();
    $time->setNome("Unidavi FC");
    $time->setAnoFundacao(2000);

    $jogador = new Jogador();
    $jogador->setNome("Pelé ".$i);
    $jogador->setPosicao("M-".$i);
    $jogador->setDataNascimento(new DateTime("2000-01-01"));
    $time->addJogador($jogador);  
    
    $jogo = new Jogo();
    $jogo->setTimes($timeA,$timeB);
    $jogo->addGol($time,$time->getJogador());

    $jogo->getNomeTimeVencedor();

    echo $time->getNome() . "<br>";
    var_dump($time->getJogadores());
?>