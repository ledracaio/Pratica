<?php
    $salario1 = 1000; 
    $salario2 = 2000;

    $salario2 = $salario1;

    ++$salario2;

    $salario1 *= 1.1;

    print nl2br("Valor Salário 1: $salario1 \n Valor Salário 2: $salario2");
    
?>