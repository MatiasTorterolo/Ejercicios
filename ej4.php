<?php

function convertir($medida, $metros) {
    
    if($medida === "centimetros") {
        
        return $metros * 100;
    } else if($medida === "pulgadas") {
        
        return $metros * 39.37;
    } else {
        
        return $metros * 3.281;
    }
}

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $metros = filter_input(INPUT_POST, 'metros', FILTER_VALIDATE_FLOAT);
    $medida = filter_input(INPUT_POST, 'medida');
    
    
    if($metros !== false and $metros !== null and $metros > 0) {
        
        $resultado = convertir($medida, $metros);
        
        echo $metros . " metros son igual a " . $resultado . " " . $medida . ".";
    }
}
