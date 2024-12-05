<?php 
$title = 'Painel Administrativo';
ob_start();
?>
<div class="content-header">
    <h1>Bem-vindo ao Painel Administrativo</h1>
</div>
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <div class="col">
            <a href="/admin/grafico-media-notas" class="list-group-item list-group-item-action text-center border p-4 h-100 d-flex flex-column justify-content-center">
                <span class="material-icons fs-1">dashboard</span>
                <p class="mt-2 mb-0">Dashboard Gráfico</p>
            </a>
        </div>
        <div class="col">
            <a href="/admin/avaliacoes" class="list-group-item list-group-item-action text-center border p-4 h-100 d-flex flex-column justify-content-center">
                <span class="material-icons fs-1">assessment</span>
                <p class="mt-2 mb-0">Visão Geral das Avaliações</p>
            </a>
        </div>
        <div class="col">
            <a href="/admin/perguntas" class="list-group-item list-group-item-action text-center border p-4 h-100 d-flex flex-column justify-content-center">
                <span class="material-icons fs-1">question_answer</span>
                <p class="mt-2 mb-0">Gerenciar Perguntas</p>
            </a>
        </div>
        <div class="col">
            <a href="/admin/setores" class="list-group-item list-group-item-action text-center border p-4 h-100 d-flex flex-column justify-content-center">
                <span class="material-icons fs-1">domain</span>
                <p class="mt-2 mb-0">Gerenciar Setores</p>
            </a>
        </div>
        <div class="col">
            <a href="/admin/dispositivos" class="list-group-item list-group-item-action text-center border p-4 h-100 d-flex flex-column justify-content-center">
                <span class="material-icons fs-1">devices</span>
                <p class="mt-2 mb-0">Gerenciar Dispositivos</p>
            </a>
        </div>
        <div class="col">
            <a href="/admin/usuarios" class="list-group-item list-group-item-action text-center border p-4 h-100 d-flex flex-column justify-content-center">
                <span class="material-icons fs-1">group</span>
                <p class="mt-2 mb-0">Gerenciar Usuários</p>
            </a>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
