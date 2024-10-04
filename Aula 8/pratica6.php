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
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #90d5ff;
        }
        .zebraIm {
            background-color: #bfe6ff;
        }
        .zebraPa {
            background-color: #d9f1ff;
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
            $line = 0;
            foreach ($dados as $linha) {
                $line++;
                print "<tr>";
                foreach ($linha as $valor) {
                    if($line % 2 == 0)
                        print "<td class='zebraPa'>{$valor}</td>";
                    else
                        print "<td class='zebraIm'>{$valor}</td>";
                }
                print "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
