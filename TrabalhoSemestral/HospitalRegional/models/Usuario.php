<?php
require_once '../config/database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = conectarBanco();
    }

    // Listar todos os usuários
    public function listarTodos() {
        $query = $this->db->query("SELECT id, login FROM usuarios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Autenticar usuário
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

    // Adicionar novo usuário
    public function adicionar($login, $senha) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM usuarios WHERE login = :login");
        $query->bindParam(':login', $login);
        $query->execute();

        if ($query->fetchColumn() > 0) {
            return false;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $query = $this->db->prepare("INSERT INTO usuarios (login, senha) VALUES (:login, :senha)");
        $query->bindParam(':login', $login);
        $query->bindParam(':senha', $senhaHash);

        return $query->execute();
    }

    // Excluir usuário
    public function excluir($id) {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}
