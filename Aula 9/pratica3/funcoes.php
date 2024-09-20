<?php
function calcularMedia() {
    $totalNotas = 0;
    for ($i = 0; $i < count(notas); $i++) { 
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
    for ($i = 0; $i < count(aulas); $i++) { 
        $sFrequencia += aulas[$i];
    }   
    $frequencia = 100 - (($sFrequencia * 100) / count(aulas));
    return $frequencia;
}

function verificarAprovacaoPorFrequencia($frequencia) {
    return $frequencia >= 70 ? "Aprovado por Frequência" : "Reprovado por Frequência";
}

function exibeMensagem($mensagem) {
    echo $mensagem;
}
?>
