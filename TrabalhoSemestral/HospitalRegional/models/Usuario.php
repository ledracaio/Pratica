<?php
require_once '../config/database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = conectarBanco();
    }

    public function autenticar($login, $senha) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE login = :login");
        $query->bindParam(':login', $login);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return true;
        }
        return false;
    }
}
