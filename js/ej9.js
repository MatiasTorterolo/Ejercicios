document.addEventListener("DOMContentLoaded", function() {
   
    const form = document.querySelector(".form-contrasena");
    const copyButton = document.querySelector("#copy-button");
    
    const resultado = form.querySelector(".resultado-container");
    const actionUrl = form.getAttribute("data-action");
    const method = form.getAttribute("method");
    
    form.addEventListener("submit", function(event) {
        
        event.preventDefault();
        
        fetch(actionUrl, {
            
            method: method,
            
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        })
        .then(response => response.json())
        .then(data => {
           
            if(data.resultado !== undefined) {
                
                resultado.innerText = data.resultado;
                copyButton.style.display = "inline";
            } else {
                
                resultado.innerText = "Error";
                copyButton.style.display = "none";
            }
        });
    });
    
    copyButton.addEventListener("click", function(){
        
        event.preventDefault();
        
        if(resultado.innerText) {
            
            navigator.clipboard.writeText(resultado.innerText).then(() => {
                alert("Contraseña copiada");
            })
            .catch(err => console.error("Error al copiar", err));
        }
    });
});

