<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <title>EJERCICIOS</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <nav class="navbar">
            <div class="logo">Ejercicios Rubicom <3</div>
            
            <select id="ejercicios" onchange="desplazarHaciaEjercicio()">
                <option value="" disabled selected>Ejercicios</option> <!-- aca voy a tener que usar js para usar scrollIntoView() -->
                <option value="ejercicio1">Ejercicio 1</option>
                <option value="ejercicio2">Ejercicio 2</option>
                <option value="ejercicio3">Ejercicio 3</option>
                <option value="ejercicio4">Ejercicio 4</option>
                <option value="ejercicio5">Ejercicio 5</option>
                <option value="ejercicio6">Ejercicio 6</option>
                <option value="ejercicio7">Ejercicio 7</option>
                <option value="ejercicio8">Ejercicio 8</option>
                <option value="ejercicio9">Ejercicio 9</option>
                <option value="ejercicio10">Ejercicio 10</option>
            </select>
            
        </nav>
        
        <script>
            function desplazarHaciaEjercicio() {
                
                var ejercicio = document.getElementById("ejercicios").value;
                
                if(ejercicio) {
                    document.getElementById(ejercicio).scrollIntoView({ behaivor: "smooth", block: "center"});
                }
                
            }
        </script>
        
        <div class="Ejercicio-1">
             
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 1</div>
            
            <section id="ejercicio1">Indique un número y se hara una sumatoria de todos los números pares desde 1 hasta el número elegido.</section>
            
            <form action="ej1.php" method="POST">
                
                <label for="numero">Número:</label>
            
                <input class="input" type="number" id="numero" name="numero" placeholder="Indique un número..." required>
            
                <input type="submit" value="SUMAR">    
            </form>
            
        </div>
  
        <div class="Ejercicio 2">
            
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 2</div>
            
            <section id="ejercicio2">Indique un número entero y se le calculará su factorial.</section>
            
            <form action="ej2.php" method="POST">
                
                <label for="numero">Número:</label>
                
                <input class="input" type="number" id="numero" name="numero" placeholder="Indique un número..." required>
                
                <input type="submit" value="FACTORIAL">        
            </form>
            
        </div>
        
        <div class="Ejercicio 3">
            
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 3</div>
            
            <section id="ejercicio3">Indique un número del 1 al 100 y se indicará si es un número primo o no.</section>
            
            <form action="ej3.php" method="POST">
                
                <label for="numero">Número:</label> 
                
                <input class="input" type="number" id="numero" name="numero" placeholder="Indique un número..." min="1" max="100" required>
                
                <input type="submit" value="ENVIAR">
            </form>
            
        </div>
        
        <div class="Ejercicio 4">
            
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 4</div>
            
            <section id="ejercicio4">Ingrese una cantidad de metros y se hara una conversión a lo que decida.</section>
            
            <form action="ej4.php" method="POST">
                
                <label for="medida">Medida:</label>
                <select id="medida" name="medida">
                    <option value="centimetros">Centímetros</option>
                    <option value="pulgadas">Pulgadas</option>
                    <option value="pies">Pies</option>
                </select>
                
                <br> <br> 
                
                <label for="metros">Metros:</label>
                <input class="input" type="number" step="any" id="metros" name="metros" placeholder="Seleccione un número..." required>
                
                <br> <br>
                
                <input type="submit" value="CONVERTIR">    
            </form>
            
        </div>
        
        <div class="Ejercicio 5">
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 5</div>
            
            <section id="ejercicio5">Elegir un número, si esta en la lista se mostrará la posición en la que está.</section>
            
            <form action="ej5.php" method="POST">
                
                <label for="numero">Número:</label>
                <input class="input" type="number" id="numero" name="numero" placeholder="Ingrese un número..." required>
                <input type="submit" value="BUSCAR">
            </form>
            
        </div>

        <div class="Ejercicio 6">
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 6</div>
            
            <section id="ejercicio6">Crear un algorítmo en donde todos los números del 1 al 100 que se los multiplique por 5 y se lo divida por 7, si su resto es menor o igual a 3, se mostraran y los números que hayan cumplido los requisitos seran agregados a un arreglo.</section>
            
            <form action="ej6.php" method="GET">
                
                <input type="submit" value="MOSTRAR">   
            </form>
            
        </div>
        
        <div class="Ejercicio 7">
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 7</div>
            
            <section id="ejercicio7">Calcular el monto de propina a dejar en un restaurante. El programa debe solicitar al usuario el monto total de la cuenta y el porcentaje de propina deseado, y calcular el monto total a pagar.</section>
            
            <form action="ej7.php" method="POST" class="text-center">
                
                <label for="cuentaSinPropina">Cuenta a pagar sin propina:</label>
                <input class="input" type="number" id="cuentaSinPropina" name="cuentaSinPropina" placeholder="Monto...">
                
                <br> <br>
                
                <label for="porcentajePropina">Porcentaje para propina:</label>
                <input class="input" type="number" id="porcentajePropina" name="porcentajePropina" placeholder="Porcentaje...">
                
                <br> <br> 
                
                <input type="submit" value="CALCULAR"> 
               
            </form>
            
        </div>
        
        <div class="Ejercicio 8">
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 8</div>
            
            <section id="ejercicio8">Crear un programa que permita convertir una cantidad de dinero de una moneda a otra. El programa debe solicitar al usuario el monto a convertir, la moneda de origen y la moneda de destino, y mostrar el resultado de la conversión.</section>
            
            <form action="ej8.php" method="POST" class="text-center">
                
                <label for="monedaActual">Desde la divisa:</label>
                <select id="monedaActual" name="monedaActual">
                    <option value="AR">AR</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="BRL">BRL</option>
                    <option value="CLP">CLP</option>
                </select>
                
                <br> <br> 
                
                <label for="monedaConvertir">Hasta la divisa:</label>
                <select id="monedaConvertir" name="monedaConvertir">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="AR">AR</option>
                    <option value="BRL">BRL</option>
                    <option value="CLP">CLP</option>
                </select>
                
                <br> <br>

                <label for="monto">Monto:</label>
                <input class="input" type="number" id="monto" name="monto" placeholder="Indique el monto a convertir...">
                
                <br> <br>
                
                <input type="submit" value="CONVERTIR">
                
            </form>
        </div>
        
        <div class="Ejercicio 9">
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 9</div>
            
            <section id="ejercicio9">Desarrollar un programa que genere contraseñas seguras. El programa debe permitir al usuario especificar la longitud y los criterios de la contraseña (mayúsculas, minúsculas, números, caracteres especiales) y generar una contraseña aleatoria.</section>
            
            <form action="ej9.php" method="GET" class="text-center">
                
               <input type="submit" value="GENERAR CONTRASEÑA">
                
            </form>
        </div>
        
        <div class="Ejercicio 10">
            <div class="text-center bg-primary text-white p-3 rounded shadow">Ejercicio 10</div>
            
            <section id="ejercicio10">Desarrolla un programa que calcule el índice de masa corporal (IMC) de una persona. El programa debe solicitar al usuario su peso y altura, y mostrar el resultado del cálculo del IMC, tanto en forma numérica como visual.</section>
            
            <form action="ej10.php" method="POST" class="text-center">
                
                <label for="altura">Altura en centimetros:</label>
                <input class="input" type="number" id="altura" name="altura" placeholder="Indique su altura...">
                
                <br> <br>
                
                <label for="peso">Peso en kilogramos:</label>
                <input class="input" type="number" id="peso" name="peso" placeholder="Indique su peso...">
                
                <br> <br>
                
                <input type="submit" value="Calcular IMC">
 
            </form>
        </div>
        <br> <br> <br> 
    </body>
</html>
