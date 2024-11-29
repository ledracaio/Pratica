<?php
require_once '../models/Usuario.php';

class AdminController {
    // Método de login
    public function login() {
        // Verifica se é uma requisição POST (formulário de login)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recebe os dados do formulário
            $usuario = new Usuario();
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            // Verifica se a autenticação foi bem-sucedida
            if ($usuario->autenticar($login, $senha)) {
                session_start();  // Inicia a sessão
                $_SESSION['admin'] = true;  // Armazena o status de login
                header('Location: /admin/dashboard');  // Redireciona para o painel
                exit;  // Garante que o código após o redirecionamento não será executado
            } else {
                $erro = "Login ou senha inválidos.";  // Mensagem de erro
                include '../views/admin/login.php';  // Exibe o formulário de login com erro
            }
        } else {
            // Caso o método não seja POST, exibe o formulário de login
            include '../views/admin/login.php';
        }
    }

    // Método de logout
    public function logout() {
        session_start();  // Inicia a sessão
        session_destroy();  // Destrói a sessão (efetiva o logout)
        header('Location: /admin/login');  // Redireciona para a página de login
        exit;  // Garante que o código após o redirecionamento não será executado
    }
}
