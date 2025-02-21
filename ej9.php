<?php

header("Content-Type: application/json; charset=UTF-8");

function generarContraseña() {
    
    $stringAleatorio = base64_encode(random_bytes(20));
    
    $contraseña = str_replace(["+", "-", "/", "?", "="], ["@", "&", "", "%", "M"], $stringAleatorio);
    
    return $contraseña;
}

echo json_encode(["resultado" => generarContraseña()]);
