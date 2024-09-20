<?php
function exibeMensagem($mensagem) {
    echo $mensagem;
}

function calcularValorFinal($valor, $desconto) {
    if (!is_numeric($valor) || !is_numeric($desconto)) {
        throw new Exception("Os parâmetros devem ser numéricos.");
    }

    $valor = floatval($valor);
    $desconto = floatval($desconto);

    if ($desconto < 0 || $desconto > 100) {
        throw new Exception("O desconto deve estar entre 0 e 100.");
    }

    return $valor - ($valor * ($desconto / 100));
}

try {
    if (!isset($_REQUEST['Valor']) || !isset($_REQUEST['Desconto'])) {
        throw new Exception("Os parâmetros 'Valor' e 'Desconto' são obrigatórios.");
    }

    $valor = $_REQUEST['Valor'];
    $desconto = $_REQUEST['Desconto'];
    $resultado = calcularValorFinal($valor, $desconto);

    exibeMensagem("Valor Inicial: $valor<br>");
    exibeMensagem("Desconto: $desconto%<br>");
    exibeMensagem("Valor Final: $resultado");

} catch (Exception $e) {
    exibeMensagem("Erro: " . $e->getMessage());
}
?>
