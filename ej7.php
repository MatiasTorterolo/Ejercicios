<?php

header("Content-Type: application/json; charset=UTF-8");

function calcularPropina($cuentaSinPropina, $porcentajePropina) {
    
    
    return ceil(($cuentaSinPropina * $porcentajePropina) / 100);
}

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $cuentaSinPropina = filter_input(INPUT_POST, "cuentaSinPropina", FILTER_VALIDATE_INT);
    $porcentajePropina = filter_input(INPUT_POST, "porcentajePropina", FILTER_VALIDATE_INT);
    
    
    if(($cuentaSinPropina and $porcentajePropina) !== false and ($cuentaSinPropina and $porcentajePropina) !== null) {
        
        $propina = calcularPropina($cuentaSinPropina, $porcentajePropina);
        
        $cuentaConPropina = $propina + $cuentaSinPropina;
        
        $resultado = "El total a pagar con la propina incluida es de $" . $cuentaConPropina . " pesos, la propina es de $" . $propina . " pesos.";
               
        echo json_encode(["resultado" => $resultado]);
    } else {
        echo json_encode(["resultado" => "Error: Los valores proporcionados son inválidos."]);
    }
    
}