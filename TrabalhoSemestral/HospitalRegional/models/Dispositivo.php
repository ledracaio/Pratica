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
        $query = "SELECT id, nome, status FROM dispositivos";
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
        // Atualiza o dispositivo no banco de dados, incluindo o novo status
        $query = $this->db->prepare("UPDATE dispositivos SET nome = :nome, status = :status WHERE id = :id");
        $query->execute($dados);
    }

    // Excluir Dispositivo
    public function excluir($id) {
        $query = "DELETE FROM dispositivos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
