<!DOCTYPE html>
<?php 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
include_once "conf/config.php"; // Include the configuration file

$title = "Lista de Produtos";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";

$pdo = Conexao::getInstance();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        <input type="text" name="consulta" id="consulta" value="<?php echo htmlspecialchars($consulta); ?>">
        <input type="submit" value="Pesquisar">
    </form>
    
    <br>
    <table border="1">
       <tr>
           <?php 
           try {
               // Fetch columns dynamically
               $stmt = $pdo->query("SELECT * FROM {$tableConfig['tableName']} LIMIT 1");
               if ($stmt) {
                   $columns = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
                   foreach ($columns as $column) {
                       echo "<td><b>" . ucfirst(htmlspecialchars($column)) . "</b></td>";
                   }
                   echo "<td><b>Alterar</b></td>"; 
                   echo "<td><b>Excluir</b></td>"; 
               } else {
                   throw new Exception("Falha ao executar a consulta.");
               }
           } catch (Exception $e) {
               echo "Erro: " . htmlspecialchars($e->getMessage());
           }
           ?>
       </tr>
    <?php 
    $consultaColumn = $tableConfig['primaryKey']; 
    try {
        $stmt = $pdo->prepare("SELECT * FROM {$tableConfig['tableName']} WHERE $consultaColumn::text LIKE :consulta");
        $nome = $consulta . '%';
        $stmt->execute([':consulta' => $nome]);
        
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>" . htmlspecialchars($linha[$column]) . "</td>";
            }
            echo "<td><a href='cad.php?acao=editar&codigo=" . htmlspecialchars($linha[$tableConfig['primaryKey']]) . "'>/</a></td>";
            echo "<td><a href=\"javascript:excluirRegistro('acao.php?acao=excluir&codigo=" . htmlspecialchars($linha[$tableConfig['primaryKey']]) . "')\">X</a></td>";
            echo "</tr>";
        }
    } catch (Exception $e) {
        echo "Erro: " . htmlspecialchars($e->getMessage());
    }
    ?>       
    </table>
</body>
</html>
