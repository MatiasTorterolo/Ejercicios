<?php

header("Content-Type: application/json; charset=UTF-8");

$listaNumeros = array(2, 23, 45, 56, 3443, 33, 5, 77, 88, 99, 70, 41, 32, 54, 57, 99, 10, 321, 56, 32, 222, 1231, 100, 45, 5443, 65, 85, 62);

function buscarNumero($buscarNumero, array $listaNumeros) {
    
    $match = false;
    
    $listaNumerosMatcheados = array();
    
    foreach ($listaNumeros as $indice => $numero) {
        
        if($numero === $buscarNumero) {
            
            $listaNumerosMatcheados[] = $indice;
            $match = true;
        }
    }
    
    if($match === false) {
        
        $resultado = "El número " . $buscarNumero . " no se encuentra en el arreglo.";
        
        return $resultado;
    }
    
    $listaNumerosMatcheadosString = implode(", ", $listaNumerosMatcheados);
    $resultado = "El número ". $buscarNumero . " se encuentra en la/s posición/es: " . $listaNumerosMatcheadosString;

    return $resultado;
}

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD", FILTER_SANITIZE_STRING);

if($method === "GET") {
    
    $buscarNumero = filter_input(INPUT_GET, "numero", FILTER_VALIDATE_INT);
    
    if($buscarNumero !== false and $buscarNumero !== null) {
        
        $resultado = buscarNumero($buscarNumero, $listaNumeros);
        
        echo json_encode(["resultado" => $resultado]);
    }
}
