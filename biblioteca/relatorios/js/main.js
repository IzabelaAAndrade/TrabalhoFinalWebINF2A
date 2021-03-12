const relatoresEl = document.getElementById('opcoes');
const filtroEl = document.getElementById('filtro');
const filtroContainerEl = document.getElementById('filtro_container');

const resultadoEl = document.getElementById('resultado');
const resultadoContainerEl = document.getElementById('resultado_container');
const imprimirBtn = document.getElementById('imprimir');

const aplicarBtn = document.getElementById('aplicar');
const resetBtn = document.getElementById('reset');

var relatores = [];

let selectedRelator = null;
let selectedRelatorEl = null;

let request = function() {
    if(!selectedRelator) return;
    selectedRelator.request()
    .then(resp => resp.text())
    .then(text => {
        resultadoContainerEl.innerHTML = text;
    });
}

// seleciona um relator
let selectRelatorHandler = function(relator, el) {
    if(selectedRelatorEl)
        selectedRelatorEl.classList.remove('selected');
    el.classList.add('selected');
    selectedRelatorEl = el;
    selectedRelator = relator;

    if(relator.temFiltros()) {
        filtroContainerEl.innerHTML = '';
        filtroContainerEl.appendChild(relator.getDiv());
        filtroEl.classList.remove('hidden');
    }
    else {
        filtroEl.classList.add('hidden');
    }
    
    request();
}

// adiciona um relator à barra de relatores
let addRelator = function(relator) {
    let relatorEl = document.createElement('div');
    relatorEl.innerHTML = relator.nome;
    relatorEl.classList.add('relator');
    relatorEl.classList.add('solid')
    relatorEl.addEventListener('click', () => selectRelatorHandler(relator, relatorEl));
    relatoresEl.appendChild(relatorEl);
    if(!selectedRelator)
        selectRelatorHandler(relator, relatorEl)
}

// imprime o relatório (pdf)
let printRelatorio = function() {
    let div = document.createElement('div');
    div.classList.add('print_div');
    div.innerHTML = resultadoContainerEl.innerHTML;
    document.body.appendChild(div);
    print();
    div.remove();
}

imprimirBtn.addEventListener('click', printRelatorio);
resetBtn.addEventListener('click', () => selectedRelator.reset())
aplicarBtn.addEventListener('click', () => request());

//  inicia os relatores e filtros
let iniTest = function() {
    
    // teste range
    let retRange = new Relator('range', 'php/test.php');
    retRange.addFiltro(new FiltroGenerico('nome', 'nome', 'roger'))
    retRange.addFiltro(new FiltroRange('números', 'min', 'quant', 39, 45))
    addRelator(retRange);

    // teste com sql
    let retA = new Relator('alunos', 'php/alunos.php');
    retA.addFiltro(new FiltroGenerico('nome', 'nome', ''))
    retA.addFiltro(new FiltroRange('nota', 'notamin', 'notamax', 0, 100))
    addRelator(retA);

    let rAtrasos = new Relator('atrasos', 'php/F/relacao_atrasos.php');
    addRelator(rAtrasos);

    let rDescartes = new Relator('descartes', 'php/F/relacao_descartes.php');
    addRelator(rDescartes);

    let rMultas = new Relator('multas', 'php/F/relacao_multas.php');
    addRelator(rMultas);


}

iniTest();
