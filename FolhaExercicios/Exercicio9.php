<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 9</title>
    <?php
    function calcularParcelasCompostos($valorAVista, $parcelas) {
        $taxaInicial = 0.02;
        $taxaAumento = 0.003;

        $taxaJuros = $taxaInicial + ($taxaAumento * (($parcelas / 12) - 2));
        $montante = $valorAVista * pow((1 + $taxaJuros), $parcelas);
        $valorParcela = $montante / $parcelas;

        $retorno = "<p>O valor da parcela para {$parcelas} vezes com juros compostos é R$ " . number_format($valorParcela, 2, ',', '.') . ".</p>";
        exibeMensagem($retorno);
    }

    function infoIsset($chave) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return isset($_POST[$chave]) ? $_POST[$chave] : 0;
        } else {
            return isset($_GET[$chave]) ? $_GET[$chave] : 0;
        }
    }

    function isSelect($value) {
        if (infoIsset('parcelas') == $value) {
            return print "selected";
        }
    }

    function exibeMensagem($mensagem) {
        print $mensagem;
    }
    ?>
</head>
<body>
    <h1>Exercício 9</h1>
    <h2>Cálculo de Parcelas com Juros Compostos</h2>

    <form method="POST" action="">
        <label for="valorAVista">Valor à vista da moto (R$):</label>
        <input type="number" id="valorAVista" name="valorAVista" value="8654.00" readonly><br><br>
        <label for="parcelas">Escolha o número de parcelas:</label>
        <select id="parcelas" name="parcelas" required>
            <option value="24" <?php isSelect(24); ?>>24 vezes</option>
            <option value="36" <?php isSelect(36); ?>>36 vezes</option>
            <option value="48" <?php isSelect(48); ?>>48 vezes</option>
            <option value="60" <?php isSelect(60); ?>>60 vezes</option>
        </select><br><br>
        <button type="submit">Calcular Parcelas</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valorAVista = 8654.00;
        $parcelas = infoIsset('parcelas'); 
        calcularParcelasCompostos($valorAVista, $parcelas);
    }
    ?>
</body>
</html>