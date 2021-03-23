document.getElementById('caixa-seleção').addEventListener('change', function () {
    let removeClass = document.querySelectorAll('.mudar');
    let fieldset = document.querySelector("#fieldset");
    
    for(let div of removeClass){
        div.classList.add('escondido');
        fieldset.classList.add('tamanho');
    }
    for(let div of removeClass){
        if(div.id === this.value.toLowerCase()){
            div.classList.remove('escondido');
            fieldset.classList.remove('tamanho');
        }
    }
});
