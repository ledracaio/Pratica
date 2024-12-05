<?php
require_once '../config/database.php';

class Dispositivo {
    private $db;

    public function __construct() {
        $this->db = conectarBanco();
    }

    // Criar Dispositivo
    public function salvar($dados) {
        $query = "INSERT INTO dispositivos (nome, status) VALUES (:nome, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':status', $dados['status'], PDO::PARAM_BOOL);
        $stmt->execute();
    }

    // Listar Dispositivos
    public function listarTodos() {
        $query = "SELECT id, nome, status FROM dispositivos ORDER BY id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Listar Dispositivo por ID
    public function listarDispositivoPorId($id) {
        $query = "SELECT id, nome, status FROM dispositivos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar Dispositivo
    public function atualizar($dados) {
        $query = "UPDATE dispositivos SET nome = :nome, status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':status', $dados['status'], PDO::PARAM_BOOL); // Certifique-se de usar PDO::PARAM_BOOL para valores booleanos
        $stmt->bindParam(':id', $dados['id'], PDO::PARAM_INT);
        $stmt->execute();
    }


    // Excluir Dispositivo
    public function excluir($id) {
        $query = "DELETE FROM dispositivos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
