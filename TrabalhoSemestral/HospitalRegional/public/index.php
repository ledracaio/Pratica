<?php
session_start();

require_once '../config/database.php';
require_once '../controllers/AvaliacaoController.php';
require_once '../controllers/AdminController.php';
require_once '../controllers/PerguntaController.php';
require_once '../controllers/SetorController.php';
require_once '../controllers/DispositivoController.php';

// Função para verificar a autenticação (apenas em rotas protegidas)
function verificarSessao() {
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        header('Location: /admin/login');
        exit;
    }
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Roteamento básico
if (strpos($url, '/avaliacao') === 0) {
    $avaliacaoController = new AvaliacaoController();
    if ($url === '/avaliacao' && $method === 'GET') {
        $avaliacaoController->exibirFormulario();
    } elseif ($url === '/avaliacao/salvar' && $method === 'POST') {
        $avaliacaoController->salvarAvaliacao();
    }
} elseif (strpos($url, '/admin') === 0) {
    $adminController = new AdminController();

    // Rota de login não requer autenticação
    if ($url === '/admin/login' && $method === 'GET') {
        $adminController->login();
    } elseif ($url === '/admin/login' && $method === 'POST') {
        $adminController->login();
    } elseif ($url === '/admin/logout' && $method === 'GET') {
        $adminController->logout();
    } else {
        // Verifica sessão para rotas protegidas
        verificarSessao();

        $perguntaController = new PerguntaController();
        $setorController = new SetorController();
        $dispositivoController = new DispositivoController();
        $avaliacaoController = new AvaliacaoController();
        $usuarioController = new AdminController();

        // Roteamento para perguntas
        if ($url === '/admin/perguntas' && $method === 'GET') {
            $perguntaController->listarPerguntas();
        } elseif ($url === '/admin/perguntas/salvar' && $method === 'POST') {
            $perguntaController->salvarPergunta();
        } elseif ($url === '/admin/perguntas/adicionar' && $method === 'GET') {
            $perguntaController->exibirFormularioAdicionar();
        } elseif (preg_match('/^\/admin\/perguntas\/editar\/(\d+)$/', $url, $matches)) {
            $perguntaController->editarPergunta($matches[1]);
        } elseif (preg_match('/^\/admin\/perguntas\/deletar\/(\d+)$/', $url, $matches)) {
            $perguntaController->excluirPergunta($matches[1]);
        }

        // Roteamento para setores
        elseif ($url === '/admin/setores' && $method === 'GET') {
            $setorController->listarSetores();
        } elseif ($url === '/admin/setores/salvar' && $method === 'POST') {
            $setorController->salvarSetor();
        } elseif (preg_match('/^\/admin\/setores\/editar\/(\d+)$/', $url, $matches)) {
            $setorController->editarSetor($matches[1]);
        } elseif (preg_match('/^\/admin\/setores\/deletar\/(\d+)$/', $url, $matches)) {
            $setorController->excluirSetor($matches[1]);
        } elseif ($url === '/admin/setores/adicionar' && $method === 'GET') {
            $setorController->exibirFormularioAdicionar();
        }

        // Roteamento para usuários
        elseif ($url === '/admin/usuarios' && $method === 'GET') {
            $usuarioController->listarUsuarios();
        } elseif ($url === '/admin/usuarios/salvar' && $method === 'POST') {
            $usuarioController->adicionarUsuario();
        } elseif (preg_match('/^\/admin\/usuarios\/deletar\/(\d+)$/', $url, $matches)) {
            $usuarioController->excluirUsuario($matches[1]);
        } elseif ($url === '/admin/usuarios/adicionar' && $method === 'GET') {
            $usuarioController->exibirFormularioAdicionar();
        }

        // Avaliações Registradas
        elseif ($url === '/admin/avaliacoes' && $method === 'GET') {
            $avaliacaoController->listarAvaliacoes();
        }

        // Gráfico de Médias das Notas
        elseif ($url === '/admin/grafico-media-notas' && $method === 'GET') {
            $avaliacaoController->exibirGraficoMediaNotas();
        }

        // Roteamento para dispositivos
        elseif ($url === '/admin/dispositivos' && $method === 'GET') {
            $dispositivoController->listarDispositivos();
        } elseif ($url === '/admin/dispositivos/salvar' && $method === 'POST') {
            $dispositivoController->salvarDispositivo();
        } elseif (preg_match('/^\/admin\/dispositivos\/editar\/(\d+)$/', $url, $matches)) {
            $dispositivoController->editarDispositivo($matches[1]);
        } elseif (preg_match('/^\/admin\/dispositivos\/deletar\/(\d+)$/', $url, $matches)) {
            $dispositivoController->excluirDispositivo($matches[1]);
        } elseif ($url === '/admin/dispositivos/adicionar' && $method === 'GET') {
            $dispositivoController->exibirFormularioAdicionar();
        }

        // Painel do admin
        else {
            include '../views/admin/dashboard.php';
        }
    }
} else {
    // Página inicial
    if ($url === '/') {
        $avaliacaoController = new AvaliacaoController();
        $avaliacaoController->exibirFormulario();
    } else {
        http_response_code(404);
        echo "Página não encontrada.";
    }
}
