document.addEventListener("DOMContentLoaded", function() {
   
    const forms = document.querySelectorAll(".exercise-form-numbers");
    
    forms.forEach(form => {
        
        const input = form.querySelector(".exercise-input");
        const resultado = form.querySelector(".resultado-container");
        let actionUrl = form.getAttribute("data-action");
        const method = form.getAttribute("method");

        form.addEventListener("submit", function(event) {
           
            event.preventDefault();
            
            let numero = input.value.trim();
            
            if(method === "GET") {
                   
                actionUrl = actionUrl.split('?')[0];
                let params = new URLSearchParams(new FormData(form)).toString();
                actionUrl += "?" + params;
                
                fetch(actionUrl, {
                    
                    method: method,
                    
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    }
                })
                .then(response => response.json())
                .then(data => {
                
                    if (data.resultado !== undefined) {
                    
                        resultado.innerText = data.resultado; 
                    } else {
                    
                        resultado.innerText = "";
                    }
                });
            } else {
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
            }   
        });
        
        input.addEventListener("input", function() {

                if (input.value.trim() === "") {
                resultado.innerText = "";
            }
        });
    });
});




