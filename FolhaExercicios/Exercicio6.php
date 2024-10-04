<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 6</title>
    <style>
        .sufficient { color: blue; }
        .insufficient { color: red; }
        .exact { color: green; }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <?php
    function calcularCompra($precos, $quantidades) {
        $total = 0;
        foreach ($precos as $produto => $preco) {
            $total += $preco * $quantidades[$produto];
        }
        return $total;
    }

    function exibeResultado($total, $dinheiroDisponivel) {
        if ($total < $dinheiroDisponivel) {
            $saldo = $dinheiroDisponivel - $total;
            return "<p class='sufficient'>Joãozinho ainda pode gastar R$ " . number_format($saldo, 2, ',', '.') . ".</p>";
        } elseif ($total > $dinheiroDisponivel) {
            $falta = $total - $dinheiroDisponivel;
            return "<p class='insufficient'>Joãozinho precisa de R$ " . number_format($falta, 2, ',', '.') . " a mais.</p>";
        } else {
            return "<p class='exact'>Saldo para compras esgotado.</p>";
        }
    }

    function infoIsset($chave) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return isset($_POST["$chave"]) ? $_POST["$chave"] : 0;
        } else {
            return isset($_GET["$chave"]) ? $_GET["$chave"] : 0;
        }
    }

    function exibeMensagem($mensagem) {
        echo $mensagem;
    }
    
    function exibeRelacaoCompra($precos, $quantidades) {
        $tabela = "<h3>Relação da Compra:</h3>";
        $tabela .= "<table><tr><th>Produto</th><th>Preço por kg (R$)</th><th>Quantidade (kg)</th><th>Total (R$)</th></tr>";
        
        foreach ($precos as $produto => $preco) {
            $quantidade = $quantidades[$produto];
            $totalProduto = $preco * $quantidade;
            $tabela .= "<tr>
                            <td>" . ucfirst($produto) . "</td>
                            <td>" . number_format($preco, 2, ',', '.') . "</td>
                            <td>" . number_format($quantidade, 2, ',', '.') . "</td>
                            <td>" . number_format($totalProduto, 2, ',', '.') . "</td>
                        </tr>";
        }
        
        $tabela .= "</table>";
        return $tabela;
    }
    ?>    
</head>
<body>
    <h1>Exercício 6</h1>
    <h2>Compra do Joãozinho</h2>

    <form method="POST" action="">
        <h2>Valores por kg (R$)</h2>
        <label for="precoMaca">Maçã:</label>
        <input type="number" step="0.01" id="precoMaca" name="precoMaca" required><br>
        
        <label for="precoMelancia">Melancia:</label>
        <input type="number" step="0.01" id="precoMelancia" name="precoMelancia" required><br>
        
        <label for="precoLaranja">Laranja:</label>
        <input type="number" step="0.01" id="precoLaranja" name="precoLaranja" required><br>
        
        <label for="precoRepolho">Repolho:</label>
        <input type="number" step="0.01" id="precoRepolho" name="precoRepolho" required><br>
        
        <label for="precoCenoura">Cenoura:</label>
        <input type="number" step="0.01" id="precoCenoura" name="precoCenoura" required><br>
        
        <label for="precoBatatinha">Batatinha:</label>
        <input type="number" step="0.01" id="precoBatatinha" name="precoBatatinha" required><br><br>

        <h2>Quantidades compradas (Kg)</h2>
        <label for="qtdMaca">Maçã (kg):</label>
        <input type="number" step="0.01" id="qtdMaca" name="qtdMaca" required><br>

        <label for="qtdMelancia">Melancia (kg):</label>
        <input type="number" step="0.01" id="qtdMelancia" name="qtdMelancia" required><br>

        <label for="qtdLaranja">Laranja (kg):</label>
        <input type="number" step="0.01" id="qtdLaranja" name="qtdLaranja" required><br>

        <label for="qtdRepolho">Repolho (kg):</label>
        <input type="number" step="0.01" id="qtdRepolho" name="qtdRepolho" required><br>

        <label for="qtdCenoura">Cenoura (kg):</label>
        <input type="number" step="0.01" id="qtdCenoura" name="qtdCenoura" required><br>

        <label for="qtdBatatinha">Batatinha (kg):</label>
        <input type="number" step="0.01" id="qtdBatatinha" name="qtdBatatinha" required><br><br>

        <button type="submit">Calcular Total</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precos = [
            'maçã' => infoIsset('precoMaca'),
            'melancia' => infoIsset('precoMelancia'),
            'laranja' => infoIsset('precoLaranja'),
            'repolho' => infoIsset('precoRepolho'),
            'cenoura' => infoIsset('precoCenoura'),
            'batatinha' => infoIsset('precoBatatinha'),
        ];
        
        $quantidades = [
            'maçã' => infoIsset('qtdMaca'),
            'melancia' => infoIsset('qtdMelancia'),
            'laranja' => infoIsset('qtdLaranja'),
            'repolho' => infoIsset('qtdRepolho'),
            'cenoura' => infoIsset('qtdCenoura'),
            'batatinha' => infoIsset('qtdBatatinha'),
        ];

        $dinheiroDisponivel = 50.00;
        $total = calcularCompra($precos, $quantidades);

        exibeMensagem(exibeRelacaoCompra($precos, $quantidades));
        exibeMensagem("<h3>Valor total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>");
        exibeMensagem(exibeResultado($total, $dinheiroDisponivel));
    }
    ?>
</body>
</html>