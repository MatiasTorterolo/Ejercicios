<?php

header("Content-Type: application/json; charset=UTF-8");

function factorial($numero) {
    
    $sumatoria = 1;
    
    //si el numero llega a ser 0, no entra en el for y simplemente retorna 1, 1 es el factorial de 0
    for($i = 1; $i <= $numero; $i++) {
        
        $sumatoria *= $i;
    }
    
    return $sumatoria;
}

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD", FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $numero = filter_input(INPUT_POST, "numero", FILTER_VALIDATE_INT);
    
    if($numero !== false and $numero !== null and $numero >= 0 and !(is_float($numero))) {
        
        $resultadoNumerico = factorial($numero);
        
        $resultado = "El factorial de " . $numero . " es " . $resultadoNumerico . ".";
    } else {
        
        $resultado = "El factorial de " . $numero . " no existe.";
    }
    
    echo json_encode(["resultado" => $resultado]);
}