// JS para limpar os campos do formulário
botao_limpar = document.querySelector("#limpa");
inputs_texto = document.querySelectorAll(".texto");

function limpar_formulario(){
    for(input of inputs_texto){
        input.value = "";
    }
}

botao_limpar.addEventListener("click", limpar_formulario);