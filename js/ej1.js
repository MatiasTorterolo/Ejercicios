
document.addEventListener("DOMContentLoaded", function() {
    
    document.getElementById("ej1").addEventListener("submit", function(event) {
        
        event.preventDefault();
        
        let numero = document.getElementById("numero").value;
        
        if (numero === "") {
            alert("Por favor, ingrese un número");
            return;
        }
        
        fetch("ej1.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded" 
            },
            body: "numero=" + encodeURIComponent(numero)
        })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("resultado").innerText = data.resultado;
                })
                        .catch(error => console.error("Error:", error));
    });
});

