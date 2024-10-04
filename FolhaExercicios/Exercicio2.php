<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
    <?php 
    function verificarDivisibilidade($numero) {
        if ($numero % 2 == 0) {
            $retorno =  "<p>O número $numero é divisível por 2</p>";
        } else {
            $retorno =  "<p>O número $numero não é divisível por 2</p>";
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
    <h1>Exercício 2</h1>
    <h2>Divisível por 2</h2>

    <form method="POST" action="">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required><br><br>
        <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = infoIsset('numero');
        verificarDivisibilidade($numero);
    }
    ?>
</body>
</html>