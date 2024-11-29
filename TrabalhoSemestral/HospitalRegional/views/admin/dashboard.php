<?php 
$title = 'Painel Administrativo';
ob_start();
?>
<h1>Bem-vindo ao Painel Administrativo</h1>
<div class="list-group">
    <a href="/admin/perguntas" class="list-group-item list-group-item-action">Gerenciar Perguntas</a>
    <a href="/admin/setores" class="list-group-item list-group-item-action">Gerenciar Setores</a>
    <a href="/admin/dispositivos" class="list-group-item list-group-item-action">Gerenciar Dispositivos</a>
    <a href="/admin/avaliacoes" class="list-group-item list-group-item-action">Gerenciar Resultados</a>
</div>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
