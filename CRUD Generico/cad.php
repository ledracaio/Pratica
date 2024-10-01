<!DOCTYPE html>
<?php
include_once "acao.php";
include_once "conf/config.php"; // Include the configuration file

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados = [];
if ($acao == 'editar') {
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : "";
    if ($codigo > 0) {
        $dados = buscarDados($codigo);
    }
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
<br>
<a href="index.php"><button>Listar</button></a>
<a href="cad.php"><button>Novo</button></a>
<br><br>
<form action="acao.php" method="post">
    <input readonly type="text" name="codigo" id="codigo" value="<?php echo $acao == "editar" ? $dados[$tableConfig['primaryKey']] : 0; ?>"><br>
    
    <?php
    // Dynamically create input fields based on the table structure
    foreach ($dados as $key => $value) {
        if ($key !== 'codigo') {
            echo "<label for=\"$key\">$key:</label>";
            echo "<input required type=\"text\" name=\"$key\" id=\"$key\" value=\"$value\"><br>";
        }
    }
    ?>
    
    <br><button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
</form>
</body>
</html>
