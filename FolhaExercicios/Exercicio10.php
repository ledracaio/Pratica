<?php
$pastas = array(
    "bsn" => array(
        "3a Fase" => array(
            "desenvWeb",
            "bancoDados 1",
            "engSoft 1"
        ),
        "4a Fase" => array(
            "Intro Web",
            "bancoDados 2",
            "engSoft 2"
        )
    )
);

function exibirArvore($array, $nivel = 0) {
    $hifens = str_repeat("-", $nivel + 1);
    foreach ($array as $chave => $valor) {
        if (is_array($valor)) {
            echo str_repeat("  ", $nivel) . $hifens . " " . $chave . "</br>";
            exibirArvore($valor, $nivel + 1);
        } else {
            echo str_repeat("  ", $nivel) . $hifens . " " . $valor . "</br>";
        }
    }
}

exibirArvore($pastas);
?>
