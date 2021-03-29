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
    
    resultadoContainerEl.innerHTML = 'Carregando...'; // feio?

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
    let titulo = document.createElement('h1');
    titulo.innerHTML = 'Relatório ' + selectedRelator.nome;
    let center = document.createElement('center');
    center.appendChild(titulo);
    div.appendChild(center);
    div.innerHTML += resultadoContainerEl.innerHTML;
    
    for(child of document.body.children) // fixme
        child.classList.add('hidden');

    document.body.appendChild(div);
    print();
    div.remove();

    for(child of document.body.children) // fixme
        child.classList.remove('hidden');
}

imprimirBtn.addEventListener('click', printRelatorio);
resetBtn.addEventListener('click', () => selectedRelator.reset())
aplicarBtn.addEventListener('click', () => request());

//  inicia os relatores e filtros
let iniTest = function() {
    
    // // teste range
    // let retRange = new Relator('range', 'php/test.php');
    // retRange.addFiltro(new FiltroGenerico('nome', 'nome', 'roger'))
    // retRange.addFiltro(new FiltroRange('números', 'min', 'quant', 39, 45))
    // addRelator(retRange);

    // // teste com sql
    // let retA = new Relator('alunos', 'php/alunos.php');
    // retA.addFiltro(new FiltroGenerico('nome', 'nome', ''))
    // retA.addFiltro(new FiltroRange('nota', 'notamin', 'notamax', 0, 100))
    // addRelator(retA);

    let rAtrasos = new Relator('Atrasos', 'php/F/relacao_atrasos.php');
    addRelator(rAtrasos);

    let rDescartes = new Relator('Descartes', 'php/F/relacao_descartes.php');
    addRelator(rDescartes);

    let rMultas = new Relator('Multas', 'php/F/relacao_multas.php');
    rMultas.addFiltro(new FiltroRange('Data', 'data_inicio', 'data_fim', '', '', 'date'));
    addRelator(rMultas);

    let rAcervo = new Relator('Acervo', 'php/H/relacao_acervo.php');
    rAcervo.addFiltro(new FiltroSelect('Tipo', 'acervo', 'livros|periódicos:periodicos|acadêmicos:academicos|mídias:midias'));
    addRelator(rAcervo);

    let rEmprestimos = new Relator('Empréstimos', 'php/H/relacao_emprestimos.php');
    addRelator(rEmprestimos);

    let rReservas = new Relator('Reservas', 'php/H/relacao_reservas.php');
    rReservas.addFiltro(new FiltroSelect('Tipo do relatório', 'reservas', 'geral|por data:data'));
    rReservas.addFiltro(new FiltroGenerico('Data', 'dta_espe', '', 'date'));
    addRelator(rReservas);
}

iniTest();
