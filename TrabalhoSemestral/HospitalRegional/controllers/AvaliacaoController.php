<?php
require_once '../models/Avaliacao.php';
require_once '../models/Dispositivo.php';
require_once '../models/Setor.php';

class AvaliacaoController {
    public function exibirFormulario() {
        $avaliacao = new Avaliacao();
        $setorController = new Setor();
        $dispositivoController = new Dispositivo();
    
        $perguntas = $avaliacao->listarPerguntasAtivas();
        $setoresFiltro = $setorController->listarTodos();
        $dispositivosFiltro = $dispositivoController->listarTodos();
    
        // Verifica se os valores de setor e dispositivo estão na sessão ou se são passados via POST
        $id_setor = $_POST['id_setor'] ?? 4;  // Default para 4
        $id_dispositivo = $_POST['id_dispositivo'] ?? 2;  // Default para 2
    
        // Passa as variáveis para a view
        include '../views/avaliacao/formulario.php';
    }
    
    

    public function salvarAvaliacao() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respostas = $_POST['resposta'] ?? [];
            $feedback = $_POST['feedback'] ?? null;
            $id_setor = $_POST['id_setor'] ?? 4;
            $id_dispositivo = $_POST['id_dispositivo'] ?? 2;
    
            if (!empty($respostas) && $id_setor && $id_dispositivo) {
                $avaliacao = new Avaliacao();
                foreach ($respostas as $id_pergunta => $resposta) {
                    $dados = [
                        'id_setor' => $id_setor,
                        'id_pergunta' => $id_pergunta,
                        'id_dispositivo' => $id_dispositivo,
                        'resposta' => $resposta,
                        'feedback' => $feedback
                    ];
                    $avaliacao->salvar($dados);
                }
    
                // Após salvar, redireciona para a página de agradecimento
                include '../views/avaliacao/agradecimento.php';
            } else {
                echo "Erro: Não foram recebidas respostas válidas ou informações do setor/dispositivo estão ausentes.";
            }
        }
    }
    

    // Exibe as avaliações registradas
    public function listarAvaliacoes() {
        $avaliacao = new Avaliacao();
        $avaliacoes = $avaliacao->listarAvaliacoes();  // Busca as avaliações
        include '../views/admin/avaliacoes.php';  // Inclui a página de avaliações
    }

    public function exibirGraficoMediaNotas() {
        $perguntaController = new Avaliacao();
        
        // Obter todas as perguntas
        $perguntas = $perguntaController->listarPerguntasAtivas();
    
        // Calcular a média das notas por pergunta
        $mediaNotasPorPergunta = [];
        foreach ($perguntas as $pergunta) {
            // Calcular a média das notas para a pergunta
            $mediaNotasPorPergunta[] = [
                'id_pergunta' => $pergunta['id'],
                'texto_pergunta' => $pergunta['texto'],
                'media_resposta' => $perguntaController->calcularMediaPorPergunta($pergunta['id'])
            ];
        }
    
        // Passa os dados para a view
        include '../views/admin/grafico_medianotas.php';
    }
}
