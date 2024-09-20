<?php
require_once 'funcoes.php';

define('notas', array(6, 8, 10, 7));
define('aulas', array(0, 1, 0, 0, 1, 0, 0, 1, 0, 0));

$media = calcularMedia();
$frequencia = calcularFrequencia();

$mensagem = "Média das Notas: " . $media . "</br>" .
            "Status da Aprovação por Nota: " . verificarAprovacaoPorNota($media) . "</br>" .
            "Frequência: " . $frequencia . "%</br>" .
            "Status da Aprovação por Frequência: " . verificarAprovacaoPorFrequencia($frequencia) . "</br>";

exibeMensagem($mensagem);
?>