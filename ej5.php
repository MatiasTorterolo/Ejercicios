<?php

$listaNumeros = array(2, 23, 45, 56, 3443, 33, 5, 77, 88, 99, 70, 41, 32, 54, 57, 99, 10, 321, 56, 32, 222, 1231, 100, 45, 5443, 65, 85, 62);

print_r($listaNumeros);

function buscarNumero($buscarNumero, array $listaNumeros) {
    
    $match = false;
    
    foreach ($listaNumeros as $indice => $numero) {
        
        if($numero === $buscarNumero) {
            
            echo "<br><br>" . "El número " . $numero . " está en la posición " . $indice . ".";
            $match = true;
        }
    }
    
    if($match === false) {
        
        echo "<br><br>" . "El número " . $buscarNumero . " no se encuentra en el arreglo.";
    }
}

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $buscarNumero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
    
    if($buscarNumero !== false and $buscarNumero !== null) {
        
        buscarNumero($buscarNumero, $listaNumeros);
    }
}
