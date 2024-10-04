<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
    <?php
    function calcularAreaRetangulo($ladoA, $ladoB) {
        $area = $ladoA * $ladoB;
        if ($area > 10) {
            $retorno = "<h1>A área do retângulo de lados $ladoA e $ladoB metros é $area metros quadrados.</h1>";
        } else {
            $retorno = "<h3>A área do retângulo de lados $ladoA e $ladoB metros é $area metros quadrados.</h3>";
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
    ?>    
</head>
<body>
    <h1>Exercício 4</h1>
    <h2>Área do Retângulo</h2>

    <form method="POST" action="">
        <label for="ladoA">Digite o comprimento do lado A (em metros):</label>
        <input type="number" id="ladoA" name="ladoA" required><br><br>
        <label for="ladoB">Digite o comprimento do lado B (em metros):</label>
        <input type="number" id="ladoB" name="ladoB" required><br><br>
        <button type="submit">Calcular Área</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ladoA = infoIsset('ladoA');
        $ladoB = infoIsset('ladoB');
        calcularAreaRetangulo($ladoA, $ladoB);
    }
    ?>
</body>
</html>
