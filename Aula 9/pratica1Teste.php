<?php
function calcularMedia($notas) {
    $totalNotas = array_sum($notas);
    $quantidadeNotas = count($notas);
    return $totalNotas / $quantidadeNotas;
}

function verificarAprovacaoPorNota($media) {
    return $media >= 7 ? "Aprovado por Nota" : "Reprovado por Nota";
}

function calcularFrequencia($faltas) {
    $sFrequencia = 0;
    for ($i=0; $i < count($faltas); $i++) { 
        $sFrequencia += $faltas[$i];
    }   
    $frequencia = 100 - (($sFrequencia*100)/$i);
    return round($frequencia);
}

function verificarAprovacaoPorFrequencia($frequencia) {
    return $frequencia >= 70 ? "Aprovado por Frequência" : "Reprovado por Frequência";
}

function exibeMensagem($mensagem) {
    echo $mensagem;
}

$notas = [8.5, 6.0, 7.5, 9.0];

$faltas = [1, 0, 1, 0, 0, 0, 0];

$media = calcularMedia($notas);
$statusNota = verificarAprovacaoPorNota($media);

$frequencia = calcularFrequencia($faltas);
$statusFrequencia = verificarAprovacaoPorFrequencia($frequencia);

exibeMensagem("Média das Notas: " . $media . "\n".
"Status da Aprovação por Nota: " . verificarAprovacaoPorNota($media) . "\n".
"Frequência: " . $frequencia . "%\n".
"Status da Aprovação por Frequência: " . verificarAprovacaoPorFrequencia($frequencia) . "\n");
?>