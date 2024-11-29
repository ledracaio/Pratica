<?php
require_once '../models/Dispositivo.php';

class DispositivoController {

    public function listarDispositivos() {
        $dispositivo = new Dispositivo();
        $dispositivos = $dispositivo->listarTodos();
        include '../views/admin/dispositivos.php';
    }
    public function exibirFormularioAdicionar() {
        include '../views/admin/adicionar_dispositivo.php'; // Página para adicionar dispositivo
    }

    public function salvarDispositivo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => isset($_POST['id']) ? $_POST['id'] : null,
                'nome' => $_POST['nome'],
                'status' => isset($_POST['status']) ? true : false
            ];
    
            $dispositivo = new Dispositivo();
            
            if ($dados['id']) {
                // Se o ID está presente, é uma atualização
                $dispositivo->atualizar($dados);
            } else {
                // Se não há ID, é uma adição
                $dispositivo->salvar($dados);
            }
            
            header('Location: /admin/dispositivos');
        }
    }

    public function editarDispositivo($id) {
        $dispositivo = new Dispositivo();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => $id,
                'nome' => $_POST['nome'],
                'status' => $_POST['status'] ?? 0
            ];

            // Atualiza o dispositivo no banco de dados
            $dispositivo->atualizar($dados);
            header('Location: /admin/dispositivos');
        } else {
            // Exibe o formulário de edição com os dados atuais
            $dispositivoAtual = $dispositivo->listarDispositivoPorId($id);
            include '../views/admin/editar_dispositivo.php';
        }
    }

    public function excluirDispositivo($id) {
        // Verifica se o ID é válido
        if ($id) {
            $dispositivo = new Dispositivo();
            $dispositivo->excluir($id);  // Chama a função de excluir no modelo
        }
        // Redireciona após a exclusão
        header('Location: /admin/dispositivos');
        exit();
    }
    
}
