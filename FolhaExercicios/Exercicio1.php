<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
    <?php
    function calcularSoma($v1, $v2, $v3) {
        $soma = $v1 + $v2 + $v3;
    
        if ($v1 > 10) {
            $retorno = "<p style='color:blue;'>A soma é: $soma</p>";
        } elseif ($v2 < $v3) {
            $retorno = "<p style='color:green;'>A soma é: $soma</p>";
        } elseif ($v3 < $v1 && $v3 < $v2) {
            $retorno = "<p style='color:red;'>A soma é: $soma</p>";
        } else {
            $retorno = "<p>A soma é: $soma</p>";
        }
    
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

    $valor1 = infoIsset('valor1');
    $valor2 = infoIsset('valor2');
    $valor3 = infoIsset('valor3');
    ?>
</head>
<body>
    <h1>Exercício 1</h1>
    <h2>Soma de Três Valores</h2>

    <form method="POST" action="">
        <label for="valor1">Valor 1:</label>
        <input type="number" id="valor1" name="valor1" required><br><br>

        <label for="valor2">Valor 2:</label>
        <input type="number" id="valor2" name="valor2" required><br><br>

        <label for="valor3">Valor 3:</label>
        <input type="number" id="valor3" name="valor3" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        calcularSoma($valor1, $valor2, $valor3);
    }
    ?>
</body>
</html>
