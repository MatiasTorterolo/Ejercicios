<?php
header("Content-Type: application/json; charset=UTF-8");

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
    
    $medida = filter_input(INPUT_POST, 'medida');
    $metros = filter_input(INPUT_POST, 'metros', FILTER_VALIDATE_FLOAT);
    
    
    
    if($metros !== false and $metros !== null and $metros > 0) {
        
        $conversion = convertir($medida, $metros);
        
        $resultado =  $metros . " metros son igual a " . $conversion . " " . $medida . ".";
        
        echo json_encode(["resultado" => $resultado]);
    }
}
