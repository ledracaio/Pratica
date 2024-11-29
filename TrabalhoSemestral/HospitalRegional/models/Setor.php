<?php
require_once '../config/database.php';

class Setor {
    private $db;

    public function __construct() {
        $this->db = conectarBanco();
    }

    // Criar Setor
    public function salvar($dados) {
        $query = "INSERT INTO setores (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->execute();
    }

    // Listar Setores
    public function listarTodos() {
        $query = "SELECT id, nome FROM setores";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Listar Setor por ID
    public function listarSetorPorId($id) {
        $query = "SELECT id, nome FROM setores WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar Setor
    public function atualizar($dados) {
        $query = "UPDATE setores SET nome = :nome WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':id', $dados['id']);
        $stmt->execute();
    }

    // Excluir Setor
    public function excluir($id) {
        $query = "DELETE FROM setores WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
