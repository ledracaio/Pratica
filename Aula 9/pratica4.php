<?php
function obterValor() {
    if (isset($_REQUEST['valor'])) {
        if (is_numeric($_REQUEST['valor'])) {
            return $_REQUEST['valor'];
        }
        throw new Exception("O parâmetro 'valor' deve ser numérico.");        
    }
    throw new Exception("O parâmetro 'valor' é obrigatório.");
}

function obterDesconto() {
    if (isset($_REQUEST['desconto'])) {
        if (is_numeric($_REQUEST['desconto'])) {
            return $_REQUEST['desconto'];
        }
        throw new Exception("O parâmetro 'desconto' deve ser numérico.");
    }
    throw new Exception("O parâmetro 'desconto' é obrigatório.");
}

function exibeMensagem($mensagem) {
    echo $mensagem;
}

function calcularValorFinal($valor, $desconto) {
    return obterValor() - obterDesconto();
}

try {
    $valor = obterValor();
    $desconto = obterDesconto();
    $resultado = calcularValorFinal($valor, $desconto);

    exibeMensagem("Valor Final: $resultado");

} catch (Exception $e) {
    exibeMensagem("Erro: " . $e->getMessage());
}
?>