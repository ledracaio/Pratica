<?php /*function metroQuadrado(int $lado1 = 1, int $lado2 = 1) {

echo "Total M2: " . ($lado1 * $lado2);

}

metroQuadrado(5);*/


function metroQuadrado(int $lado1 = 1, int $lado2 = 1) {

    return $lado1 * $lado2;
    
    }
    
    function exibeMensagem($mensagem) {
    
    echo $mensagem;
    
    }
    
    exibeMensagem("Total M2: " . metroQuadrado(10,10));
?>