<?php

header("Content-Type: application/json; charset=UTF-8");

//funcion que hace la suma
function sumarNumerosPares($numero) {
    
    if($numero <= 0){
        
        return 0;
    }
    
    $sumatoria = 1;
    
    for( $i = 2; $i < $numero + 1; $i++) {
        
        if($i % 2 == 0) {
            $sumatoria += $i;
        }
        
    }
    
    return $sumatoria;
}

//utilizamos esta funcion para no usar directamente la variable global $_SERVER
$method = filter_input(INPUT_SERVER, "REQUEST_METHOD", FILTER_SANITIZE_STRING);

//verifcamos que el metodo sea post
if($method === "POST") {
    
    //verificamos que sea un numero valido
    $numero = filter_input(INPUT_POST, "numero", FILTER_VALIDATE_INT);
    
    if($numero !== false and $numero !== null) {
        $resultado = sumarNumerosPares($numero);
        
        echo json_encode(["resultado" => $resultado]);
        exit;
    }
}

echo json_encode(["error" => "Número inválido o no proporcionado"]);
exit;







