<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HRAV' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #495057;
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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
            background-color: white;
        }

        .table th, .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-sm {
            padding: 5px 12px;
        }
    </style>
</head>
<body>
    <!-- Conteúdo Principal -->
    <div class="container mt-4">
        <!-- Conteúdo dinâmico -->
        <?= $content ?? ''; ?>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>© 2024 Hospital Regional Alto Vale</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
