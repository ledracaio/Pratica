<?php
require_once '../models/Usuario.php';

class AdminController {
    // Método de login
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se o usuário já está logado
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
            header('Location: /admin/dashboard');
            exit;
        }

        // Processa requisições POST (formulário de login)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            // Verifica credenciais
            if ($usuario->autenticar($login, $senha)) {
                $_SESSION['admin'] = true;  // Define o status de login
                header('Location: /admin/dashboard');  // Redireciona ao painel
                exit;
            } else {
                $erro = "Login ou senha inválidos.";  // Mensagem de erro
            }
        }

        // Exibe o formulário de login
        include '../views/admin/login.php';
    }

    // Método de logout
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Destroi a sessão e redireciona para login
        session_destroy();
        header('Location: /admin/login');
        exit;
    }

    public function exibirFormularioAdicionar() {
        // Inclui o arquivo da view com o formulário de adicionar usuário
        include '../views/admin/adicionar_usuario.php';
    }

    // Listar usuários
    public function listarUsuarios() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se o admin está logado
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: /admin/login');
            exit;
        }

        $usuario = new Usuario();
        $usuarios = $usuario->listarTodos();
        include '../views/admin/listar_usuarios.php';
    }

    // Adicionar novo usuário
    public function adicionarUsuario() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se o admin está logado
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: /admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            if (!empty($login) && !empty($senha)) {
                $usuario = new Usuario();
                if ($usuario->adicionar($login, $senha)) {
                    header('Location: /admin/usuarios'); // Redireciona após adicionar
                    exit;
                } else {
                    $erro = "Erro: o login já existe.";
                }
            } else {
                $erro = "Preencha todos os campos.";
            }
        }

        include '../views/admin/adicionar_usuario.php';
    }

    // Excluir usuário
    public function excluirUsuario($id) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se o admin está logado
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: /admin/login');
            exit;
        }

        $usuario = new Usuario();
        if ($usuario->excluir($id)) {
            header('Location: /admin/usuarios'); // Redireciona após excluir
            exit;
        } else {
            $erro = "Erro ao excluir o usuário.";
        }
    }
}
