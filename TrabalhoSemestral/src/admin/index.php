<?php
// Lógica para verificar autenticação de administrador

require_once '../includes/db.php';

$entityManager = getEntityManager();
// Lógica para exibir as informações administrativas
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Painel Administrativo</h1>
    <nav>
        <ul>
            <li><a href="cadastro.php">Cadastrar Perguntas</a></li>
            <li><a href="visualizacao.php">Visualizar Avaliações</a></li>
        </ul>
    </nav>
</body>
</html>
