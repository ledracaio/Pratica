<?php
require_once '../models/Avaliacao.php';

class AvaliacaoController {
    public function exibirFormulario() {
        $avaliacao = new Avaliacao();
        $perguntas = $avaliacao->listarPerguntasAtivas();
        include '../views/avaliacao/formulario.php';
    }

    public function salvarAvaliacao() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respostas = $_POST['resposta'] ?? [];
            $feedback = $_POST['feedback'] ?? null;

            if (!empty($respostas)) {
                $avaliacao = new Avaliacao();
                foreach ($respostas as $id_pergunta => $resposta) {
                    $dados = [
                        'id_setor' => $_POST['id_setor'] ?? 4,
                        'id_pergunta' => $id_pergunta,
                        'id_dispositivo' => $_POST['id_dispositivo'] ?? 2,
                        'resposta' => $resposta,
                        'feedback' => $feedback
                    ];
                    $avaliacao->salvar($dados);
                }
                include '../views/avaliacao/agradecimento.php';
            } else {
                echo "Erro: Não foram recebidas respostas válidas.";
            }
        }
    }

    // Exibe as avaliações registradas
    public function listarAvaliacoes() {
        $avaliacao = new Avaliacao();
        $avaliacoes = $avaliacao->listarAvaliacoes();  // Busca as avaliações
        include '../views/admin/avaliacoes.php';  // Inclui a página de avaliações
    }

    // Controller de Avaliação (AvaliacaoController.php)
public function exibirPainel() {
    // Criando o objeto Avaliacao e calculando a média das notas por pergunta
    $avaliacao = new Avaliacao();
    $mediaPorPergunta = $avaliacao->calcularMediaPorPergunta();
    
    // Passando os dados para a visualização do painel administrativo
    include '../views/admin/painel.php';
}

}
