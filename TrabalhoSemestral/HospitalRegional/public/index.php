<?php
session_start();  // Inicia a sessão para garantir o acesso à variável de sessão em todo o fluxo

require_once '../config/database.php';
require_once '../controllers/AvaliacaoController.php';
require_once '../controllers/AdminController.php';
require_once '../controllers/PerguntaController.php';
require_once '../controllers/SetorController.php';
require_once '../controllers/DispositivoController.php';

// Função de verificação de sessão (autenticação)
function verificarSessao() {
    // Se a sessão não estiver iniciada ou o usuário não estiver logado, redireciona para login
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        header('Location: /admin/login');
        exit;
    }
    else {
        return true;
    }
    
}

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Roteamento básico para avaliação
    if (strpos($url, '/avaliacao') === 0) {
        $avaliacaoController = new AvaliacaoController();
        if ($url === '/avaliacao' && $method === 'GET') {
            $avaliacaoController->exibirFormulario();
        } elseif ($url === '/avaliacao/salvar' && $method === 'POST') {
            $avaliacaoController->salvarAvaliacao();
        }
} elseif (strpos($url, '/admin') === 0) {
    

    $adminController = new AdminController();
    $perguntaController = new PerguntaController();
    $setorController = new SetorController();
    $dispositivoController = new DispositivoController();

    // Login e Logout
    if ($url === '/admin/login' && $method === 'GET') {
        $adminController->login();
    
    } elseif ($url === '/admin/logout' && $method === 'GET') {
        $adminController->logout();
    }

    // Perguntas
    elseif ($url === '/admin/perguntas' && $method === 'GET') {
        $perguntaController->listarPerguntas();
    } elseif ($url === '/admin/perguntas/salvar' && $method === 'POST') {
        $perguntaController->salvarPergunta();
    } 
    elseif ($url === '/admin/perguntas/adicionar' && $method === 'GET') {
        // Exibe o formulário de adição de pergunta
        $perguntaController->exibirFormularioAdicionar();
    }
    elseif (preg_match('/^\/admin\/perguntas\/editar\/(\d+)$/', $url, $matches)) {
        $perguntaController->editarPergunta($matches[1]);
    } elseif (preg_match('/^\/admin\/perguntas\/deletar\/(\d+)$/', $url, $matches)) {
        $perguntaController->excluirPergunta($matches[1]);
    }

    // Setores
    elseif ($url === '/admin/setores' && $method === 'GET') {
        $setorController->listarSetores();
    } elseif ($url === '/admin/setores/salvar' && $method === 'POST') {
        $setorController->salvarSetor();
    } elseif (preg_match('/^\/admin\/setores\/editar\/(\d+)$/', $url, $matches)) {
        $setorController->editarSetor($matches[1]);
    } elseif (preg_match('/^\/admin\/setores\/deletar\/(\d+)$/', $url, $matches)) {
        $setorController->excluirSetor($matches[1]);
    }elseif ($url === '/admin/setores/adicionar' && $method === 'GET') {
        // Exibe o formulário de adição de setor
        $setorController->exibirFormularioAdicionar();
    } 

    //Avaliações Registradas
    elseif ($url === '/admin/avaliacoes' && $method === 'GET') {
        $avaliacaoController = new AvaliacaoController();
        $avaliacaoController->listarAvaliacoes();  // Chama o método para listar as avaliações
    }

    // Dispositivos
    elseif ($url === '/admin/dispositivos' && $method === 'GET') {
        $dispositivoController->listarDispositivos();
    } elseif ($url === '/admin/dispositivos/salvar' && $method === 'POST') {
        $dispositivoController->salvarDispositivo();
    } elseif (preg_match('/^\/admin\/dispositivos\/editar\/(\d+)$/', $url, $matches)) {
        $dispositivoController->editarDispositivo($matches[1]);
    } elseif (preg_match('/^\/admin\/dispositivos\/deletar\/(\d+)$/', $url, $matches)) {
        $dispositivoController->excluirDispositivo($matches[1]);
    }elseif ($url === '/admin/dispositivos/adicionar' && $method === 'GET') {
        // Exibe o formulário de adição de dispositivo
        $dispositivoController->exibirFormularioAdicionar();
    }

    // Página inicial do Admin (dashboard)
    else {
        include '../views/admin/dashboard.php';
    }
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}
?>
