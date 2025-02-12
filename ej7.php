<?php

function calcularPropina($cuentaSinPropina, $porcentajePropina) {
    
    
    return ceil(($cuentaSinPropina * $porcentajePropina) / 100);
}

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $cuentaSinPropina = filter_input(INPUT_POST, 'cuentaSinPropina', FILTER_VALIDATE_FLOAT);
    $porcentajePropina = filter_input(INPUT_POST, 'porcentajePropina', FILTER_VALIDATE_FLOAT);
    
    if(($cuentaSinPropina and $porcentajePropina) !== false and ($cuentaSinPropina and $porcentajePropina) !== null) {
        
        $resultado = calcularPropina($cuentaSinPropina, $porcentajePropina);
        
        echo "El total a pagar con la propina incluida es de $" . $resultado + $cuentaSinPropina . " pesos, la propina es de $" . $resultado . " pesos.";
    }
}