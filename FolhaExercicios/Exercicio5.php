<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
    <?php
    function calcularAreaTriangulo($base, $altura) {
        $area = ($base * $altura) / 2;
        $retorno = "<p>A área do triângulo de base $base metros e altura $altura metros é $area metros quadrados.</p>";
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
    <h1>Exercício 5</h1>
    <h2>Área do Triângulo Retângulo</h2>

    <form method="POST" action="">
        <label for="base">Digite o comprimento da base (em metros):</label>
        <input type="number" id="base" name="base" required><br><br>
        <label for="altura">Digite o comprimento da altura (em metros):</label>
        <input type="number" id="altura" name="altura" required><br><br>
        <button type="submit">Calcular Área</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = infoIsset('base');
        $altura = infoIsset('altura');
        calcularAreaTriangulo($base, $altura);
    }
    ?>
</body>
</html>
