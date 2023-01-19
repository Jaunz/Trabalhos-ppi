document.addEventListener('DOMContentLoaded', () => {
    const nodeH1 = document.querySelector("h1");
    nodeH1.addEventListener("click", () => {
        nodeH1.textContent = "Dono do currículo";
        });
    });

document.addEventListener('DOMContentLoaded', () =>{
    const nodeH2 = document.querySelectorAll("h2");
    for(let node of nodeH2)
    node.addEventListener("click", () => node.textContent = "Obrigado");
});