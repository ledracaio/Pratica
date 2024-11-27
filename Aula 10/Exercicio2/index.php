<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="text-align:center;">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
