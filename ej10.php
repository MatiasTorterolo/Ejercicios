<?php

function calcularIMC($altura, $peso) {
    
    
    return $peso / pow(($altura / 100), 2);
}

function verificarIMC($imc) {
    
    if($imc <= 18.5) {
        
        echo "<h2 style='color: #800000;'>Usted está bajo de peso (alto riesgo).</h2>";
    } elseif ($imc >= 18.5 and $imc <= 24.9) {
    
        echo "<h2 style='color: green;'>Usted tiene un peso normal.</h2>";
    } elseif ($imc >= 25 and $imc <= 29.9) {
    
        echo "<h2 style='color: #FFD700;'>Usted tiene sobrepeso.</h2>";
    } elseif ($imc >= 30 and $imc <= 34.9) {
    
        echo "<h2 style='color: #FF7F7F;'>Usted tiene Obesidad tipo I (bajo riesgo).</h2>";
    } elseif ($imc >= 35 and $imc <= 39.9) {
        
        echo "<h2 style='color: #FF4D4D;'>Usted tiene Obesidad tipo II (riesgo moderado).</h2>";
    } elseif ($imc > 39.9) {
        
        echo "<h2 style='color: #800000;'>Usted tiene Obesidad tipo III (alto riesgo).</h2>";
    }
    
}


$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

if($method === "POST") {
    
    $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_INT);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_INT);
    
    if( ($altura and $peso) !== false and ($altura and $peso) !== null) {
        
        $resultado = bcdiv(calcularIMC($altura, $peso), '1', 2);
        
        echo "
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');
        
            body {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            }
            
        </style>
       
        <h1 style='text-align: center;'>Su IMC es de: " . $resultado . "</h1>";
        
        verificarIMC($resultado);
        
        echo " 
            <p>
            <strong>Para su consideración:</strong> <br>
            <strong style='color: #800000;'>Peso bajo:</strong> menos de 18.5 <br>
            <strong style='color: green;'>Peso normal:</strong> 18.5 – 24.9 <br>
            <strong style='color: #FFD700;'>Sobrepeso:</strong> 25.0 – 29.9 <br>
            <strong style='color: #FF7F7F;'>Obesidad I:</strong> 30.0 - 34.9 <br>
            <strong style='color: #FF4D4D;'>Obesidad II:</strong> 35.0 - 39.9 <br>
            <strong style='color: #800000;'>Obesidad III:</strong> Más de 39.9</p>
            ";
        
    }
}
