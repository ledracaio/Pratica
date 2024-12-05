<?php
require_once '../config/database.php';

class Avaliacao {
    private $db;

    public function __construct() {
        $this->db = conectarBanco();
    }

    // Retorna as perguntas ativas
    public function listarPerguntasAtivas() {
        $query = $this->db->query("SELECT * FROM perguntas WHERE status = TRUE");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Salva a avaliação no banco
    public function salvar($dados) {
        $query = $this->db->prepare("
            INSERT INTO avaliacoes (id_setor, id_pergunta, id_dispositivo, resposta, feedback, data_hora)
            VALUES (:id_setor, :id_pergunta, :id_dispositivo, :resposta, :feedback, NOW())
        ");
    
        $query->execute([
            ':id_setor' => $dados['id_setor'],
            ':id_pergunta' => $dados['id_pergunta'],
            ':id_dispositivo' => $dados['id_dispositivo'],
            ':resposta' => $dados['resposta'],
            ':feedback' => $dados['feedback']
        ]);
    }
    

    // Modelo de Avaliação (Avaliacao.php)
    public function listarAvaliacoes() {
        // Fazendo uma junção entre as tabelas de avaliações, perguntas, dispositivos e setores
        $query = $this->db->query("
            SELECT a.id,p.texto as pergunta, d.nome AS dispositivo, s.nome AS setor,a.resposta, a.feedback, a.data_hora 
            FROM avaliacoes a
            INNER JOIN perguntas p ON a.id_pergunta = p.id
            INNER JOIN dispositivos d ON a.id_dispositivo = d.id
            INNER JOIN setores s ON a.id_setor = s.id
            ORDER BY a.data_hora DESC
        ");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calcularMediaPorPergunta($perguntaId) {
        $sql = "SELECT AVG(resposta) as media FROM avaliacoes WHERE id_pergunta = :pergunta_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pergunta_id', $perguntaId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['media'] ?? 0;
    }
    
}
