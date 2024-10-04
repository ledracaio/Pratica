<?php
// Configurações de timezone
date_default_timezone_set('America/Sao_Paulo');

// Configurações de codificação
mb_internal_encoding("UTF-8");
mb_http_input("p"); // Altera para 'p' para verificar dados de entrada POST
mb_http_output("UTF-8");
?>
