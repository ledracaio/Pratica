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
            ':id_setor' => 4,
            ':id_pergunta' => $dados['id_pergunta'],
            ':id_dispositivo' => 2,
            ':resposta' => $dados['resposta'],
            ':feedback' => $dados['feedback']
        ]);
    }

    // Modelo de Avaliação (Avaliacao.php)
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
// Modelo de Avaliação (Avaliacao.php)
public function calcularMediaPorPergunta() {
    // Consulta para calcular a média de notas por pergunta
    $query = $this->db->query("
        SELECT p.id, p.pergunta, AVG(CAST(a.resposta AS DECIMAL)) AS media
        FROM avaliacoes a
        JOIN perguntas p ON a.id_pergunta = p.id
        WHERE a.resposta IS NOT NULL
        GROUP BY p.id, p.pergunta
    ");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


}
