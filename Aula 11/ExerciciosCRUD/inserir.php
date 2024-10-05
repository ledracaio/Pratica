<?php
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");

if (!$conn) {
    die("Erro na conexão: " . pg_last_error());
}

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$sql = "INSERT INTO TBPESSOA (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO) 
        VALUES ($1, $2, $3, $4, $5, $6)";

$result = pg_query_params($conn, $sql, array($nome, $sobrenome, $email, $senha, $cidade, $estado));

if ($result) {
    echo "Cadastro realizado com sucesso!";
    echo "<script>
            document.addEventListener('keydown', function() {
                window.location.href = 'index.php';
            });
          </script>";
} else {
    echo "Erro ao cadastrar: " . pg_last_error($conn);
}

pg_close($conn);
?>
