<?php


function generarContraseña() {
    
    $stringAleatorio = base64_encode(random_bytes(20));
    
    $contraseña = str_replace(["+", "-", "/", "?", "="], ["@", "&", "", "%", "M"], $stringAleatorio);
    
    return $contraseña;
}

echo "Su contraseña segura: " . generarContraseña();
