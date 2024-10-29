<?php
function getPerguntas($conn) {
    $result = pg_query($conn, "SELECT * FROM perguntas WHERE status = 'ativa'");
    return pg_fetch_all($result);
}

function saveFeedback($conn, $respostas, $feedback) {
    foreach ($respostas as $id_pergunta => $resposta) {
        $query = "INSERT INTO avaliacoes (id_pergunta, resposta, feedback, data_hora) VALUES ($1, $2, $3, NOW())";
        $result = pg_query_params($conn, $query, array($id_pergunta, $resposta, $feedback));
        if (!$result) {
            // Log error or handle accordingly
        }
    }
}
?>
