<?php

define('notas', array(6, 8, 10, 7));

define('aulas',array(0, 1, 0, 0, 1, 0, 0, 1, 0, 0));

function calcularMedia() {
    $totalNotas = 0;
    for ($i=0; $i < count(notas); $i++) { 
        $totalNotas += notas[$i];
    }   
    $quantidadeNotas = count(notas);
    return $totalNotas / $quantidadeNotas;
}

function verificarAprovacaoPorNota($media) {
    return $media >= 7 ? "Aprovado por Nota" : "Reprovado por Nota";
}

function calcularFrequencia() {
    $sFrequencia = 0;
    for ($i=0; $i < count(aulas); $i++) { 
        $sFrequencia += aulas[$i];
    }   
    $frequencia = 100 - (($sFrequencia*100)/$i);
    return $frequencia;
}

function verificarAprovacaoPorFrequencia($frequencia) {
    return $frequencia >= 70 ? "Aprovado por Frequencia" : "Reprovado por Frequencia";
}

function exibeMensagem($mensagem) {
    echo $mensagem;
}

$media = calcularMedia();
$frequencia = calcularFrequencia();

exibeMensagem("Média das Notas: " . $media . "\n".
"Status da Aprovação por Nota: " . verificarAprovacaoPorNota($media) . "\n".
"Frequência: " . $frequencia . "%\n".
"Status da Aprovação por Frequência: " . verificarAprovacaoPorFrequencia($frequencia) . "\n");
?>