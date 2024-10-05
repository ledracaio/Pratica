<?php include_once "edicao.php"?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
</head>
<body>
    <h1>Editar Pessoa</h1>
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($pessoa['pesnome']); ?>" required><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" value="<?php echo htmlspecialchars($pessoa['pessobrenome']); ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($pessoa['pesemail']); ?>"><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($pessoa['pescidade']); ?>"><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($pessoa['pesestado']); ?>" maxlength="2"><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>

<?php
pg_close($conn);
?>
