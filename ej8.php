<?php

header("Content-Type: application/json; charset=UTF-8");

$divisas = array(
    "USD" => 1,
    "EUR" => 0.96,
    "AR" => 1056,
    "BRL" => 5.77,
    "CLP" => 958
);

function convertirMoneda($monedaActual, $monedaConvertir, $monto) {
    
    global $divisas;
    
    $valorMonedaActual = null;
    $valorMonedaConvertir = null;
    
    foreach($divisas as $divisa => $valor) {
        if($divisa === $monedaActual) {
            $valorMonedaActual = $valor;
        }
        if($divisa === $monedaConvertir) {
            $valorMonedaConvertir = $valor;
        }
    }
    
    $montoDolares = $monto / $valorMonedaActual;
    
    $montoConvertido = $montoDolares * $valorMonedaConvertir;
    
    return $montoConvertido;
}

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD", FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $monedaActual = filter_input(INPUT_POST, "monedaActual", FILTER_SANITIZE_STRING);
    $monedaConvertir = filter_input(INPUT_POST, "monedaConvertir", FILTER_SANITIZE_STRING);
    $monto = filter_input(INPUT_POST, "monto", FILTER_VALIDATE_INT);
    
    if(($monedaActual and $monedaConvertir and $monto) !== false and ($monedaActual and $monedaConvertir and $monto) !== null) {
        
        $montoConvertido = number_format(convertirMoneda($monedaActual, $monedaConvertir, $monto), 5);

        $resultado =  $monto . " " . $monedaActual . " es/son igual/es a " . $montoConvertido . " " . $monedaConvertir . ".";
        
        echo json_encode(["resultado" => $resultado]);
    }
}