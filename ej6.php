<?php

function algoritmo() {
    
    $arregloNumeros = array();
    
    for($i = 1; $i <= 100; $i++) {
        
        $resSinDividir = ($i * 5);
        
        $resDividido = $resSinDividir / 7;
        
        $resto = fmod($resSinDividir, 7);
        
        if($resto <= 3 ) {
            
           echo "El número " . $i . " cumplió con los requisitos para listarse, el resultado fue " . $resDividido . ", el resto fue de " . $resto . "." . "<br><br>";
           
           array_push($arregloNumeros, $i);
        }
        
    }
    
    print_r($arregloNumeros);
}

algoritmo();
