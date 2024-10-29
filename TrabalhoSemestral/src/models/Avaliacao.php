<?php
include_once '../includes/db.php'; // Incluindo o arquivo de conexão

class Avaliacao {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function inserir($id_pergunta, $resposta, $feedback) {
        $query = "INSERT INTO avaliacoes (id_pergunta, resposta, feedback, data_hora) VALUES ($1, $2, $3, NOW())";
        $result = pg_query_params($this->conn, $query, array($id_pergunta, $resposta, $feedback));

        return $result !== false;
    }

    public function listar() {
        $query = "SELECT * FROM avaliacoes";
        $result = pg_query($this->conn, $query);
        return pg_fetch_all($result);
    }
}
?>
