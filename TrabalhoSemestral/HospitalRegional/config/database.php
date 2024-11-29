<?php
function conectarBanco() {
    try {
        $dsn = 'pgsql:host=localhost;port=5432;dbname=hospital_hrav';
        $usuario = 'postgres';
        $senha = 'postgres';
        return new PDO($dsn, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
    }
}
