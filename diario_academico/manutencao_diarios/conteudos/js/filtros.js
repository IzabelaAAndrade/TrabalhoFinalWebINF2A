/*

classes para "filtrar" os relatórios

*/

let FiltroGenerico = function(nome, apelido, padrao=0) {
   
    this.nome = nome;

    let html = null;
    let input = null;
    
    this.getDiv = function() {
        
        if(html) return html;

        let div = document.createElement('div');
        div.classList.add('filtro');

        let label = document.createElement('label');
        label.innerHTML = this.nome + ': ';
        div.appendChild(label);
        label.appendChild(document.createElement('br'));
        
        input = document.createElement('input');
        input.value = padrao;
        label.appendChild(input);

        html = div;
        return html;
    }

    this.getUrl = function() {
        return apelido + '=' + input.value;
    }

    this.reset = function() {
        input.value = padrao;
    }
}

// filtro com um mínimo e um máximo
let FiltroRange = function(nome, apelido1, apelido2, padrao1=0, padrao2=0) {
   
    this.nome = nome;

    let html = null;
    let input1 = null;
    let input2 = null;
    
    this.getDiv = function() {
        
        if(html) return html;
        
        // input 1
        input1 = document.createElement('input');
        input1.type='number';
        input1.value = padrao1;
        
        // label 1
        let label = document.createElement('label');
        label.innerHTML = this.nome + ': ';
        label.appendChild(document.createElement('br'));
        label.appendChild(input1);
        
        // input 2
        input2 = document.createElement('input');
        input2.type='number';
        input2.value = padrao2;
        
        // label 2
        let label2 = document.createElement('label');
        label2.innerHTML = ' a ';
        label2.appendChild(input2);
        
        // div
        let div = document.createElement('div');
        div.classList.add('filtro', 'range');
        div.appendChild(label);
        div.appendChild(label2);
        
        // restringe os valores de input 1 e 2
        input1.addEventListener('change', () => {
            let v1 = parseInt(input1.value), v2 = parseInt(input2.value);
            if(v1>v2) input1.value = input2.value 
        });
        input2.addEventListener('change', () => {
            let v1 = parseInt(input1.value), v2 = parseInt(input2.value);
            if(v2<v1) input2.value = input1.value 
        });

        html = div;
        return html;
    }

    this.getUrl = function() {
        return apelido1 + '=' + input1.value + '&' + apelido2 + '=' + input2.value;
    }

    this.reset = function() {
        input1.value = padrao1;
        input2.value = padrao2;
    }
}