<?php
    $salario1 = 1000; 
    $salario2 = 2000;

    $salario2 = $salario1;

    ++$salario2;

    $salario1 *= 1.1;

    print nl2br("Valor Salário 1: $salario1 \n Valor Salário 2: $salario2");

    print("<br><br>");
    
    if($salario1 > $salario2) {
        print("O Valor do salário 1 é maior que salário 2");
    }
    else if ($salario1 < $salario2) {
        print("O Valor do salário 2 é maior que salário 1");
    }
    else {
        print("O valores dos salários são iguais");
    }
?>