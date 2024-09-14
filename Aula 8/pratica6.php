<?php
// Definindo a matriz multidimensional com os dados fornecidos
$dados = [
    ["Matemática", 5, 8.5],
    ["Português", 2, 9],
    ["Geografia", 10, 6],
    ["Educação Física", 2, 8]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Prática 6</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Prática 6</h1>
    <table>
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Faltas</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $linha) {
                print "<tr>";
                foreach ($linha as $valor) {
                    echo "<td>{$valor}</td>";
                }
                print "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
