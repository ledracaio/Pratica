<?php
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");

if (!$conn) {
    die("Erro na conexão: " . pg_last_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbpessoa WHERE pescodigo = $1";
    $result = pg_query_params($conn, $sql, array($id));

    if ($result) {
        $pessoa = pg_fetch_assoc($result);
    } else {
        die("Erro ao buscar registro: " . pg_last_error($conn));
    }
} else {
    die("ID não fornecido.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "UPDATE TBPESSOA SET pesnome = $1, pessobrenome = $2, pesemail = $3, pescidade = $4, pesestado = $5 WHERE pescodigo = $6";
    $result = pg_query_params($conn, $sql, array($nome, $sobrenome, $email, $cidade, $estado, $id));

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . pg_last_error($conn);
    }
}
?>