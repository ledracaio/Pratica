<?php
require_once '../models/Setor.php';

class SetorController {

    public function listarSetores() {
        $setor = new Setor();
        $setores = $setor->listarTodos();
        include '../views/admin/setores.php';
    }
    public function exibirFormularioAdicionar() {
        include '../views/admin/adicionar_setor.php'; // Página para adicionar setor
    }

    public function salvarSetor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => isset($_POST['id']) ? $_POST['id'] : null,
                'nome' => $_POST['nome']
            ];
            
            $setor = new Setor();
            
            if ($dados['id']) {
                // Se o ID está presente, é uma atualização
                $setor->atualizar($dados);
            } else {
                // Se não há ID, é uma adição
                $setor->salvar($dados);
            }
            
            header('Location: /admin/setores');
        }
    }

    public function editarSetor($id) {
        $setor = new Setor();
        $setorEdit = $setor->listarSetorPorId($id);
        include '../views/admin/editar_setor.php';
    }

    public function excluirSetor($id) {
        // Verifica se o ID é válido
        if ($id) {
            $setor = new Setor();
            $setor->excluir($id);  // Chama a função de excluir no modelo
        }
        // Redireciona após a exclusão
        header('Location: /admin/setores');
        exit();
    }
    
}
