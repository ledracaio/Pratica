<?php
session_start();

$usuarios = [
    '1033490' => '#1033490Caio',
    'admin' => 'admin',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (isset($usuarios[$login]) && $usuarios[$login] === $senha) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['data_hora_inicio'] = date('Y-m-d H:i:s');
        $_SESSION['ultima_requisicao'] = $_SESSION['data_hora_inicio'];

        header('Location: dashboard.php');
        exit;
    } else {
        echo "Login ou senha inválidos.";
    }
}
?>
