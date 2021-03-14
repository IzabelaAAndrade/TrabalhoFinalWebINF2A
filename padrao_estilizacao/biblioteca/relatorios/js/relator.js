/*

o relator faz uma requisição get a um script php
os valores dos filtros são passados por meio dos parâmetros da url
o resultado obtido é, então, exibido para o usuário 

*/

// o que deveria chamar relator eram os scripts php que criam o relatório
// mas esse nome está bom o suficiente por enquanto

let Relator = function(nome, url, padrao=null) {
    
    this.nome = nome;
    this.url = url;

    let filtros = [];

    this.addFiltro = function(filtro) {
        filtros.push(filtro);
    }

    this.request = function() {
        let comp = '';
        if(padrao)
            comp = '?' + padrao;
        for(filtro of filtros) {
            if(comp == '')
                comp += '?';
            else
                comp += '&';
            comp += filtro.getUrl();
        }

        let url = this.url + comp; 
        console.log('request url = ' + url);

        return fetch(url);
    }

    this.getDiv = function() {
        let div = document.createElement('div');
        div.classList.add('filtro_container');
        for(filtro of filtros)
            div.appendChild(filtro.getDiv());
        return div;
    }

    this.temFiltros = function() {
        return filtros.length != 0;
    }

    this.reset = function() {
        for(filtro of filtros)
            filtro.reset();
        console.log('reset');
    }
}