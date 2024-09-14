<!DOCTYPE html>
<?php 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$title = "Lista de Marcas";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
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
    <input type="text" name="consulta" id="consulta" value="<? echo $consulta; ?>">
    <input type="submit" value="Pesquisar">
    </form>
    
    <br>
    <table border="1">
       <tr><td><b>Código</b></td>
        <td><b>Descrição</b></td> 
        <td><b>Alterar</b></td> 
        <td><b>Excluir</b></td> 
    </tr>
    <?php 
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM marca 
                             WHERE descricao 
                             LIKE '$consulta%'");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        ?>
        <tr><td><?php echo $linha['codigo'];?></td>
            <td><?php echo $linha['descricao'];?></td>
            <td><a href='cad.php?acao=editar&codigo=<?php echo $linha['codigo'];?>'>/\</a></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&codigo=<?php echo $linha['codigo'];?>')">X</a></td>
        </tr>
    <?php } ?>       
    </table>
</body>
</html>
