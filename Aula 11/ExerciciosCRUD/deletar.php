<?php
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");

if (!$conn) {
    die("Erro na conexão: " . pg_last_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tbpessoa WHERE pescodigo = $1";
    $result = pg_query_params($conn, $sql, array($id));

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao deletar: " . pg_last_error($conn);
    }
} else {
    die("ID não fornecido.");
}

pg_close($conn);
?>
