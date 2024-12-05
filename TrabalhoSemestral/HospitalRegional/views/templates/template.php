<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Painel Administrativo'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            color: #333;
        }
        .navbar {
            margin-bottom: 20px;
            border-bottom: 3px solid #007bff;
            border-radius: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 600;
        }
        .navbar-nav .nav-item .nav-link {
            font-size: 1.1rem;
            padding: 10px;
            transition: background-color 0.3s ease;
            text-align: center;
            display: block;
        }
        .navbar-nav .nav-item .nav-link:hover {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }
        .navbar-nav .nav-item .material-icons {
            margin-right: 5px;
            font-size: 1.3rem;
        }
        .container {
            max-width: 1200px;
        }
        footer {
            background-color: #343a40;
            padding: 15px;
            color: #fff;
            font-size: 14px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-sm {
            padding: 5px 10px;
        }
        .card {
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .content-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .content-header h1 {
            font-size: 2rem;
            font-weight: 600;
        }
        .content-header p {
            font-size: 1rem;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/admin">Admin HRAV</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/">
                                <span class="material-icons">home</span> Painel Administrativo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/grafico-media-notas">
                                <span class="material-icons">dashboard</span> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/avaliacoes">
                                <span class="material-icons">rate_review</span> Avaliações
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/perguntas">
                                <span class="material-icons">question_answer</span> Perguntas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/setores">
                                <span class="material-icons">apartment</span> Setores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dispositivos">
                                <span class="material-icons">devices</span> Dispositivos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/usuarios">
                                <span class="material-icons">people</span> Usuários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">
                                <span class="material-icons">exit_to_app</span> Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <?= $content ?? ''; ?>
    </main>

    <footer>
        <p>© 2024 Hospital Regional Alto Vale</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
