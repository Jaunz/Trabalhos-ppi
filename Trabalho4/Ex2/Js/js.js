function mostrar(){
    
    const nodeH2 = document.querySelectorAll("h2");

    for(let h2Sub of nodeH2){
        let proxElemento = h2Sub.nextElementSibling;

        h2Sub.addEventListener("click", () => proxElemento.style.display = "none");
        h2Sub.addEventListener("dblclick", () => proxElemento.style.display = "block");

    }

}

document.addEventListener("DOMContentLoaded", mostrar);