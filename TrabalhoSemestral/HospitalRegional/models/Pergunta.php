<?php
require_once '../config/database.php';

class Pergunta {
    private $db;

    public function __construct() {
        $this->db = conectarBanco();
    }

    // Criar Pergunta
    public function salvar($dados) {
        $query = "INSERT INTO perguntas (texto, status) VALUES (:texto, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':texto', $dados['texto']);
        $stmt->bindParam(':status', $dados['status'], PDO::PARAM_BOOL);
        $stmt->execute();
    }

    // Listar Perguntas
    public function listarTodos() {
        $query = "SELECT id, texto, status FROM perguntas";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Listar Pergunta por ID
    public function listarPerguntaPorId($id) {
        $query = "SELECT id, texto, status FROM perguntas WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar Pergunta
    public function atualizar($dados) {
        // Atualiza a pergunta no banco de dados, incluindo o novo status
        $query = $this->db->prepare("UPDATE perguntas SET texto = :texto, status = :status WHERE id = :id");
        $query->execute($dados);
    }
    

    // Excluir Pergunta
    public function excluir($id) {
        $query = "DELETE FROM perguntas WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
