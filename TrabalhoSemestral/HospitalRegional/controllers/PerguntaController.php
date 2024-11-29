<?php
require_once '../models/Pergunta.php';

class PerguntaController {

    public function listarPerguntas() {
        $pergunta = new Pergunta();
        $perguntas = $pergunta->listarTodos();
        include '../views/admin/perguntas.php';
    }

    public function exibirFormularioAdicionar() {
        include '../views/admin/adicionar_pergunta.php'; // Aqui você inclui o formulário para adicionar pergunta
    }

    public function salvarPergunta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => isset($_POST['id']) ? $_POST['id'] : null,
                'texto' => $_POST['texto'],
                'status' => isset($_POST['status']) ? true : false
            ];
    
            $pergunta = new Pergunta();
            
            if ($dados['id']) {
                // Se o ID está presente, é uma atualização
                $pergunta->atualizar($dados);
            } else {
                // Se não há ID, é uma adição
                $pergunta->salvar($dados);
            }
            
            header('Location: /admin/perguntas');
        }
    }

    public function editarPergunta($id) {
        $pergunta = new Pergunta();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => $id,
                'texto' => $_POST['texto'],
                'status' => $_POST['status'] ?? 0 // Captura o novo status
            ];

            // Atualiza a pergunta no banco de dados
            $pergunta->atualizar($dados);
            header('Location: /admin/perguntas');
        } else {
            // Exibe o formulário de edição com os dados atuais
            $perguntaEdit = $pergunta->listarPerguntaPorId($id);
            include '../views/admin/editar_pergunta.php';
        }
    }

    

    public function excluirPergunta($id) {
        // Verifica se o ID é válido
        if ($id) {
            $pergunta = new Pergunta();
            $pergunta->excluir($id);  // Chama a função de excluir no modelo
        }
        // Redireciona após a exclusão
        header('Location: /admin/perguntas');
        exit();
    }
    
}
