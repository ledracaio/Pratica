<?php
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");

if (!$conn) {
    die("Erro na conexão: " . pg_last_error());
}

$nome = $_POST['campo_primeiro_nome'];
$sobrenome = $_POST['campo_sobrenome'];
$email = $_POST['campo_email'];
$senha = $_POST['campo_password'];
$cidade = $_POST['campo_cidade'];
$estado = $_POST['campo_estado'];

$sql = "INSERT INTO TBPESSOA (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO) 
        VALUES ($1, $2, $3, $4, $5, $6)";

$result = pg_query_params($conn, $sql, array($nome, $sobrenome, $email, $senha, $cidade, $estado));

if ($result) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . pg_last_error($conn);
}

pg_close($conn);
?>
