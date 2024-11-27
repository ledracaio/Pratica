<?php
namespace Src\Auth;

class AuthMiddleware {
    public static function verificarAutenticacao() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: /login.php");
            exit();
        }
    }
}
