<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 7</title>
    <?php
    function calcularJuros($valorAVista, $parcelas, $valorParcela) {
        $valorTotalFinanciado = $parcelas * $valorParcela;
        $juros = $valorTotalFinanciado - $valorAVista;
        $retorno = "<p>O valor gasto em juros no financiamento parcelado em $parcelas vezes é R$ " . number_format($juros, 2, ',', '.') . ".</p>";
        exibeMensagem($retorno);
    }

    function infoIsset($chave) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return isset($_POST["$chave"]) ? $_POST["$chave"] : 0;
        } else {
            return isset($_GET["$chave"]) ? $_GET["$chave"] : 0;
        }
    }
    
    function exibeMensagem($mensagem) {
        print $mensagem;
    }
    ?>    
</head>
<body>
    <h1>Exercício 7</h1>
    <h2>Cálculo de Juros de Financiamento de Carro</h2>

    <form method="POST" action="">
        <label for="valorAVista">Valor à vista do carro (R$):</label>
        <input type="number" id="valorAVista" name="valorAVista" value="22500.00" readonly><br><br>
        <label for="parcelas">Número de parcelas:</label>
        <input type="number" id="parcelas" name="parcelas" value="60" readonly><br><br>
        <label for="valorParcela">Valor de cada parcela (R$):</label>
        <input type="number" id="valorParcela" name="valorParcela" value="489.65" readonly><br><br>
        <button type="submit">Calcular Juros</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valorAVista = 22500.00;
        $parcelas = infoIsset('parcelas');
        $valorParcela = infoIsset('valorParcela');
        calcularJuros($valorAVista, $parcelas, $valorParcela);
    }
    ?>
</body>
</html>
