<?php
session_start();

// Verifica se o usuário e senha ainda estão na sessão
if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
    echo "<script>alert('Os dados da sessão foram perdidos. Por favor, faça login novamente.');</script>";
    header('Location: index.php');
    exit;
}

// Atualiza a hora da última requisição
$_SESSION['ultima_requisicao'] = date('Y-m-d H:i:s');
$dataHoraInicio = $_SESSION['data_hora_inicio'];
$ultimaRequisicao = $_SESSION['ultima_requisicao'];
$tempoSessao = strtotime($ultimaRequisicao) - strtotime($dataHoraInicio);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['login']); ?></h2>
    <p><strong>Data/Hora de Início da Sessão:</strong> <?php echo $dataHoraInicio; ?></p>
    <p><strong>Data/Hora da Última Requisição:</strong> <?php echo $ultimaRequisicao; ?></p>
    <p><strong>Tempo de Sessão (segundos):</strong> <?php echo $tempoSessao; ?></p>
    <form action="logout.php" method="post">
        <button type="submit">Sair</button>
    </form>
</body>
</html>