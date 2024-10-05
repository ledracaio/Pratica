<?php include "listagem.php"?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pessoas</title>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    <a href="form_insert.html"><button>Inserir Pessoa</button></a>
    <br><br>
    <form method="post">
        <label for="consulta">Consultar</label>
        <select id="tipoConsulta" name="tipoConsulta">
            <option value="pesnome" <?php if (isset($_POST['tipoConsulta']) && $_POST['tipoConsulta'] == 'pesnome') { print 'selected';} ?>>Nome</option>
            <option value="pessobrenome" <?php if (isset($_POST['tipoConsulta']) && $_POST['tipoConsulta'] == 'pessobrenome') { print 'selected';} ?>>Sobrenome</option>
            <option value="pesemail" <?php if (isset($_POST['tipoConsulta']) && $_POST['tipoConsulta'] == 'pesemail') { print 'selected';} ?>>Email</option>
            <option value="pescidade" <?php if (isset($_POST['tipoConsulta']) && $_POST['tipoConsulta'] == 'pescidade') { print 'selected';} ?>>Cidade</option>
            <option value="pesestado" <?php if (isset($_POST['tipoConsulta']) && $_POST['tipoConsulta'] == 'pesestado') { print 'selected';} ?>>Estado</option>
        </select>
        <input type="text" name="consulta" id="consulta" value="<?php if (isset($_POST['consulta'])) { print $_POST['consulta'];} ?>">
        <input type="submit" value="Pesquisar">
    </form>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = pg_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['pesnome']); ?></td>
            <td><?php echo htmlspecialchars($row['pessobrenome']); ?></td>
            <td><?php echo htmlspecialchars($row['pesemail']); ?></td>
            <td><?php echo htmlspecialchars($row['pescidade']); ?></td>
            <td><?php echo htmlspecialchars($row['pesestado']); ?></td>
            <td>
                <a href="form_edicao.php?id=<?php echo $row['pescodigo']; ?>">Editar</a>
                <a href="deletar.php?id=<?php echo $row['pescodigo']; ?>" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
pg_close($conn);
?>
