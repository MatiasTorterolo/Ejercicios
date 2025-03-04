<?php

header("Content-Type: application/json; charset=UTF-8");

function esPrimo($numero) {
    
    if($numero === 1) {
        
        return false;
    }
    
    for($i = 1, $cantNumDivisibles = 0; $i < 100 and $cantNumDivisibles < 3; $i++){
        
        if($numero % $i === 0) {
            $cantNumDivisibles++;
        }
    }
    
    if($cantNumDivisibles > 2) {
        return false;
    }
    
    return true;
} 

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD", FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $numero = filter_input(INPUT_POST, "numero", FILTER_VALIDATE_INT);
    
    if($numero !== false and $numero !== null and $numero >= 1 and $numero <= 100) {
        
        if(esPrimo($numero)) {
            
            $resultado = "El número " . $numero . " es un número primo.";
        } else {
            
            $resultado = "El número " . $numero . " NO es un número primo.";
        }
        
        echo json_encode(["resultado" => $resultado]);
    }
}    