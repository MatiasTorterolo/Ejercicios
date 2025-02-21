
document.addEventListener("DOMContentLoaded", function() {
    
    const form = document.querySelector(".form-divisas");
    
    const actionUrl = form.getAttribute("data-action");
    const method = form.getAttribute("method");
    const resultado = form.querySelector(".resultado-container");
        
    const selectMonedaActual = form.querySelector(".select-moneda-actual");
    const selectMonedaConvertir = form.querySelector(".select-moneda-convertir");
    let inputMonto = form.querySelector(".input-monto-conversion");
    
    form.addEventListener("submit", function(event) {
       
        event.preventDefault();

        let monedaActual = selectMonedaActual.value;
        let monedaConvertir = selectMonedaConvertir.value;
        let monto = inputMonto.value.trim();
        
        
        fetch(actionUrl, {
            method: method,
            headers: {
                
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "monedaActual=" + encodeURIComponent(monedaActual) + "&monedaConvertir=" + encodeURIComponent(monedaConvertir) + "&monto=" + encodeURIComponent(monto)
        })
        .then(response => response.json())
        .then(data => {
            
            if(data.resultado !== undefined) {
                
                resultado.innerText = data.resultado;
            } else {
                
                resultado.innerText = "Error";
            }
        });
    });
    
    inputMonto.addEventListener("input", function() {
       
        if(inputMonto.value.trim() === "") {
            
            resultado.innerText = "";
        }
    });
});










