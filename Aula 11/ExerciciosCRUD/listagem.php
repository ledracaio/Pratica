<?php
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");

if (!$conn) {
    die("Erro na conexão: " . pg_last_error());
}
if (isset($_POST['consulta']) && isset($_POST['tipoConsulta'])) {
    $consulta = Array("%".$_POST['consulta']."%");
    $tipo = $_POST['tipoConsulta'];

    $sql = "SELECT * FROM tbpessoa where $tipo ilike $1";
    $result = pg_query_params($conn, $sql,$consulta);
} 
else {
    $sql = "SELECT * FROM tbpessoa";
    $result = pg_query($conn, $sql);
}



if (!$result) {
    die("Erro ao buscar registros: " . pg_last_error($conn));
}
?>