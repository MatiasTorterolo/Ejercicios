document.addEventListener("DOMContentLoaded", function() {
   
    const form = document.querySelector(".exercise-form-conversion-measure");
        
        const selectMedida = form.querySelector(".exercise-select");
        const inputMetros = form.querySelector(".exercise-input");
        const resultado = form.querySelector(".resultado-container");
        const actionUrl = form.getAttribute("data-action");
        const method = form.getAttribute("method");

        form.addEventListener("submit", function(event) {
           
            event.preventDefault();
            
            let metros = inputMetros.value.trim();
            let medida = selectMedida.value;
            
            fetch(actionUrl, {
                method: method,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "medida=" + encodeURIComponent(medida) + "&metros=" + encodeURIComponent(metros)
            })
            .then(response => response.json())
            .then(data => {
                
                if (data.resultado !== undefined) {
                    
                    resultado.innerText = data.resultado; 
                } else {
                    
                    resultado.innerText = "";
                }
            });
        });
        
    inputMetros.addEventListener("input", function() {

        if (inputMetros.value.trim() === "") {
            resultado.innerText = "";
        }
    });
});

