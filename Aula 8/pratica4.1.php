<?php
    $carros = array("Volvo", "BMW", "Toyota");
    print("Eu gosto de $carros[0], $carros[1] e $carros[2]");

    print("<br><br>Eu gosto de ");
    for ($i = 0; $i < count($carros); $i++) {
        if($i==0)
        print $carros[$i];
        else if ($i == count($carros)-1) {
            print " e ".$carros[$i];
        }
        else {
            print ", ".$carros[$i];
        }
    }

    print "<br><br>";

    $idade = array("João"=>"35", "Maria"=>"37", "José"=>"43");
    foreach($idade as $chave => $valor) {
        print "Chave=" . $chave . ", Valor=" . $valor;
        print "<br>";
    }
?>