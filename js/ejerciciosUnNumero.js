document.addEventListener("DOMContentLoaded", function() {
   
    const forms = document.querySelectorAll(".exercise-form-numbers");
    
    forms.forEach(form => {
        
        const input = form.querySelector(".exercise-input");
        const resultado = form.querySelector(".resultado-container");
        const actionUrl = form.getAttribute("data-action");
        const method = form.getAttribute("method");

        form.addEventListener("submit", function(event) {
           
            event.preventDefault();
            
            let numero = input.value.trim();
            
            fetch(actionUrl, {
                method: method,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "numero=" + encodeURIComponent(numero)
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
        
        input.addEventListener("input", function() {

                if (input.value.trim() === "") {
                resultado.innerText = "";
            }
        });
    });
});




