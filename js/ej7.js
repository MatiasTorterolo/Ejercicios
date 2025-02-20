document.addEventListener("DOMContentLoaded", function() {
    
    const form = document.querySelector(".exercise-form-tip");
    
    const inputMonto = form.querySelector(".input-monto");
    const inputPorcentaje = form.querySelector(".input-porcentaje");
    const resultado = form.querySelector(".resultado-container");
    const actionUrl = form.getAttribute("data-action");
    const method = form.getAttribute("method");
    
    form.addEventListener("submit", function(event) {
        
        event.preventDefault();
        
        const cuentaSinPropina = inputMonto.value.trim();
        const porcentajePropina = inputPorcentaje.value.trim();
        
        fetch( actionUrl, {
            method: method,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }, 
            body: "cuentaSinPropina=" + encodeURIComponent(cuentaSinPropina) + "&porcentajePropina=" + encodeURIComponent(porcentajePropina)
        })
        .then(response => response.json())
        .then(data => {
                    
            if(data.resultado !== undefined) {
                        
                resultado.innerText = data.resultado;
            } else {
                        
                resultado.innerText = "";
            }
        });
    });
    
    inputMonto.addEventListener("input", function() {
        
        if(inputMonto.value.trim() === "") {
            
            resultado.innerText = "";
        }
    });
});

