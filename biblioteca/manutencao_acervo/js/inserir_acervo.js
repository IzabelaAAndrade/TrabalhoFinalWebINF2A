const actionInput = document.querySelector('#caixa-seleção');

// Objeto com as funções de cada operação (a função deve ter o mesmo nome do value da option)
const operation = {
    inserir() {
        //remove ou insere escondido de acordo com o tipo selecionado na combobox
        document.getElementById('tipo').addEventListener('change', function () {
            let removeClass = document.querySelectorAll('.selecao');
            let geral = document.querySelector('#geral');
            let botoes = document.querySelector('#botoes');
            let fieldset = document.querySelector("#fieldset");
            
            geral.classList.add('escondido');
            botoes.classList.add('escondido');

            for(let div of removeClass){
                div.classList.add('escondido'); 
                fieldset.classList.add('tamanho');
            }

            if(this.value !== " "){
                botoes.classList.remove('escondido');
                geral.classList.remove('escondido');
                for(let div of removeClass){
                    if(div.id === this.value.toLowerCase()){
                        div.classList.remove('escondido');  
                        fieldset.classList.remove('tamanho'); 
                    }
                }
            }
        }); 

        //numero de autores ou partes 
        let nAutores = document.querySelector('#id_autores');
        nAutores.addEventListener('change', function(){
            let secoes = document.querySelectorAll('.autor');

            let qtdSecoes = secoes.length;
            let qtdEscolhida = nAutores.value;

            if(qtdSecoes < qtdEscolhida){
                let ultimo = secoes[qtdSecoes - 1];

                for(let i = qtdEscolhida; i > qtdSecoes; i--){

                    ultimo.insertAdjacentHTML(
                        "afterend",
                        `<div class="autor">
                            <h4>Autor ${i}:</h4>
                            <label for="id_autor${i}">Nome Autor: </label>
                            <input class="texto" type="text" name="autor[]" id="id_autor${i}" maxlength="40">
                            <label for="id_sobrenome${i}">Sobrenome: </label>
                            <input class="texto" type="text" name="sobrenome[]" id="id_sobrenome${i}" maxlength="40">
                            <label for="id_ordem${i}">Ordem: </label>
                            <input class="texto" type="text" name="ordem[]" id="id_ordem${i}"  maxlength="20">
                            <label for="id_qualificacao${i}">Qualificação: </label>
                            <input class="texto" type="text" name="qualificacao[]" id="id_qualificacao${i}" maxlength="20">
                        </div>
                        `
                    );
                }
            }else if(qtdSecoes > qtdEscolhida){
                if(confirm("Você está reduzindo a quantidade de autores. Os dados dos autores removidos serão perdidos. Deseja prosseguir?")){
                    let final = secoes[qtdEscolhida - 1];
                    for(let i = qtdSecoes; i > qtdEscolhida; i--){
                        final.nextElementSibling.remove();
                    }
                }else{
                    nAutores.value = qtdSecoes;
                }
            }
        });

        let nPartesEl = document.querySelector('#id_partes');
        nPartesEl.addEventListener('change', function(){
            let partes = document.querySelectorAll('.parte');

            let qtdPartes = partes.length;
            let qtdEscolhida = nPartesEl.value;

            if(qtdPartes < qtdEscolhida){
                let ultimo = partes[qtdPartes - 1];

                for(let i = qtdEscolhida; i > qtdPartes; i--){

                    ultimo.insertAdjacentHTML(
                        "afterend",
                        `<div class="parte">
                            <h4>Parte ${i}:</h4>
                            <label for="id_titulo${i}">Titulo: </label>
                            <input class="texto" type="text" name="titulo[]" id="id_titulo${i}" maxlength="40">
                            <label for="id_inicio${i}">Pagina de Inicio: </label>
                            <input class="texto" type="text" name="inicio[]" id="id_inicio${i}">
                            <label for="id_fim${i}">Pagina Final: </label>
                            <input class="texto" type="text" name="fim[]" id="id_fim${i}">
                            <label for="id_chave${i}">Palavras-Chave: </label>
                            <input class="texto" type="text" name="chave[]" id="id_chave${i}" maxlength="20">
                        </div>`

                    );
                }
            }else if(qtdPartes > qtdEscolhida){
                if(confirm("Você está reduzindo a quantidade de partes. Os dados das partes removidas serão perdidos. Deseja prosseguir?")){
                    let final = partes[qtdEscolhida - 1];
                    for(let i = qtdPartes; i > qtdEscolhida; i--){
                        final.nextElementSibling.remove();
                    }
                }else{
                    nPartesEl.value = qtdPartes;
                }
            }
        });

    },

    alterar() {
    },

    descarte() {
        const formContainerEl = document.getElementById('descarte');
        const submitBtn = document.getElementById('submit');

        formContainerEl.classList.remove('escondido');

        // Functions
        function callDescarte() {
            // Coloca todos os dados dos inputs em um objeto
            const inputs = document.querySelectorAll('.descarte-data');
            let data = {};
            for(let input of inputs) {
                if(input.value == '') return;
                data[input.name] = input.value;
            }

            // Ajax
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(this.status == 200 && this.readyState == 4) {
                    if(this.responseText == 'empty-input') {
                        errorMessage('Erro! Algum dado não foi inserido :(');
                        return;
                    }
                    const successMsg = document.createElement('div');
                    successMsg.innerHTML = 'Acervo descartado com sucesso :)';
                    successMsg.classList.add('success-msg')
                    formContainerEl.appendChild(successMsg);
                }
                else if(this.status == 201 && this.readyState == 4) {
                    const response = JSON.parse(this.responseText);
                    const data = new Date(response.data_devolucao);
                    errorMessage('O acervo ' + response.id + ' está emprestado no momento.' 
                                + ' A data de devolução prevista é ' + formatDate(data.getDate()) + '/' + formatDate((data.getMonth()+1)) 
                                + '/' + data.getFullYear());
                }
            }
            xhr.open('POST', 'php/descarte.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('data=' + (JSON.stringify(data)));
        }

        function errorMessage(msg) {
            const errorMsg = document.createElement('div');
            const formContainerEl = document.getElementById('descarte');
            errorMsg.classList.add('error-msg');
            errorMsg.innerHTML = msg;
            formContainerEl.appendChild(errorMsg);
        }

        function formatDate(value) {
            return value < 10 ? '0' + value : value;
        }

        // Event Listeners
        submitBtn.addEventListener('click', callDescarte);
    }
}

function setupOperation() {
    //Seleciona as divs que contém o HTML de cada grupo, para alterar a classe ".escondido"
    let removeClass = document.querySelectorAll('.mudar');
    let fieldset = document.querySelector("#fieldset");
    
    for(let div of removeClass){
        div.classList.add('escondido');
        fieldset.classList.add('tamanho');
    }

    for(let div of removeClass){
        if(div.id === actionInput.value.toLowerCase()){
            div.classList.remove('escondido');
            fieldset.classList.remove('tamanho');
        }
    }

    const selectedOperation = actionInput.value;
    const setupFunction = operation[selectedOperation];
    setupFunction();
}

actionInput.addEventListener('change', setupOperation);
