<?php

include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
include_once "conf/config.php"; // Include the configuration file

// Se foi enviado via GET para acao entra aqui
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
if ($acao == "excluir") {
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : 0;
    excluir($codigo);
}

// Se foi enviado via POST para acao entra aqui
$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
if ($acao == "salvar") {
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : 0;
    if ($codigo == 0) {
        inserir();
    } else {
        editar($codigo);
    }
}

// Métodos para cada operação
function inserir() {
    global $tableConfig;
    $dados = dadosForm();
    $pdo = Conexao::getInstance();

    $columns = implode(", ", array_keys($dados));
    $placeholders = ':' . implode(", :", array_keys($dados));
    $stmt = $pdo->prepare("INSERT INTO {$tableConfig['tableName']} ($columns) VALUES ($placeholders)");
    
    $stmt->execute($dados);
    header("Location: cad.php");
}

function editar($codigo) {
    global $tableConfig;
    $dados = dadosForm();
    $pdo = Conexao::getInstance();

    $setString = '';
    foreach ($dados as $column => $value) {
        $setString .= "$column = :$column, ";
    }
    $setString = rtrim($setString, ', '); // Remove trailing comma

    $stmt = $pdo->prepare("UPDATE {$tableConfig['tableName']} SET $setString WHERE {$tableConfig['primaryKey']} = :codigo");
    $dados['codigo'] = $codigo;
    $stmt->execute($dados);
    header("Location: index.php");
}

function excluir($codigo) {
    global $tableConfig;
    $pdo = Conexao::getInstance();
    $stmt = $pdo->prepare("DELETE FROM {$tableConfig['tableName']} WHERE {$tableConfig['primaryKey']} = :codigo");
    $stmt->execute([':codigo' => $codigo]);
    header("Location: index.php");
}

// Busca um item pelo código no BD
function buscarDados($codigo) {
    global $tableConfig;
    $pdo = Conexao::getInstance();
    $stmt = $pdo->prepare("SELECT * FROM {$tableConfig['tableName']} WHERE {$tableConfig['primaryKey']} = :codigo");
    $stmt->execute([':codigo' => $codigo]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Busca as informações digitadas no form
function dadosForm() {
    $dados = [];
    foreach ($_POST as $key => $value) {
        if ($key !== 'acao') {
            $dados[$key] = $value;
        }
    }
    return $dados;
}

?>
