<!DOCTYPE html>
<?php 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
include_once "conf/config.php"; // Include the configuration file

$title = "Lista de Produtos";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
</head>
<body>
    <br>
    <a href="cad.php"><button>Novo</button></a>
    <br><br>
    <form method="post">
        <input type="text" name="consulta" id="consulta" value="<?php echo $consulta; ?>">
        <input type="submit" value="Pesquisar">
    </form>
    
    <br>
    <table border="1">
       <tr>
           <?php 
           // Fetch columns dynamically
           $pdo = Conexao::getInstance();
           $stmt = $pdo->query("SELECT * FROM {$tableConfig['tableName']} LIMIT 1");
           $columns = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
           foreach ($columns as $column) {
               echo "<td><b>" . ucfirst($column) . "</b></td>";
           }
           ?>
           <td><b>Alterar</b></td> 
           <td><b>Excluir</b></td> 
       </tr>
    <?php 
    $consultaColumn = $tableConfig['primaryKey']; // Replace 'interno' with a valid column name
    $stmt = $pdo->prepare("SELECT * FROM pedido WHERE $consultaColumn::text LIKE :consulta");
    $nome = $consulta . '%';
    $stmt->execute([':consulta' => $nome]);
    
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>{$linha[$column]}</td>";
        }
        echo "<td><a href='cad.php?acao=editar&codigo={$linha[$tableConfig['primaryKey']]}'>/\</a></td>";
        echo "<td><a href=\"javascript:excluirRegistro('acao.php?acao=excluir&codigo={$linha[$tableConfig['primaryKey']]}')\">X</a></td>";
        echo "</tr>";
    }
    ?>       
    </table>
</body>
</html>
