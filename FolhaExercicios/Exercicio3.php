<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
    <?php
    function calcularAreaQuadrado($lado) {
        $area = pow($lado,2);
        $retorno = "<p>A área do quadrado de lado $lado metros é $area metros quadrados.</p>";
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
    <h1>Exercício 3</h1>
    <h2>Área do Quadrado</h2>

    <form method="POST" action="">
        <label for="lado">Digite o comprimento do lado (em metros):</label>
        <input type="number" id="lado" name="lado" required><br><br>
        <button type="submit">Calcular Área</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lado = infoIsset('lado');
        calcularAreaQuadrado($lado);
    }
    ?>
</body>
</html>
