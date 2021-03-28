let listaEl = document.getElementById('lista');
let novoBtn = document.getElementById('novo');

function Professor(id, nome='', titulo='') {
    this.id = id;
    this.nome = nome;
    switch (titulo) {
        case 'D':
            titulo = 'Doutorado';
            break;
        case 'M':
            titulo = 'Mestrado';
            break;
        case 'E':
            titulo = 'Especialização';
            break;
        case 'G':
            titulo = 'Graduação';
            break;
    }
    this.titulo = titulo;
}

Professor.prototype.getDiv = function() {
    let div = document.createElement('div');
    div.classList.add('professor', 'solid');
    
    let nome = document.createElement('span');
    nome.innerHTML = this.nome;
    div.appendChild(nome);

    let titulo = document.createElement('span');
    titulo.innerHTML = this.titulo;
    div.appendChild(titulo);

    let editar = document.createElement('div');
    editar.innerHTML = 'editar';
    editar.addEventListener('click', () => showModal('modal/editar_professor_form.php?id=' + this.id));
    editar.classList.add('btn', 'solid');
    div.appendChild(editar);

    let deletar = document.createElement('div');
    deletar.innerHTML = 'deletar';
    deletar.addEventListener('click', () => showModal('modal/deletar_professor_confirmar.php?id=' + this.id));
    deletar.classList.add('btn', 'solid');
    div.appendChild(deletar);

    return div;
}

function showModal(src) {
    console.log('show modal ' + src);
    open(src, '_self');
}

async function listProfs(parametros = '') {
    // fetch professores
    // criar professores
    // adicionar divs à lista

    let profs = await fetch('db/profsjson.php' + parametros).then(data => data.json());
    listaEl.innerHTML = '';
    for(prof of profs.lista) {
        let profObj = new Professor(prof.id, prof.nome, prof.titulacao);
        listaEl.appendChild(profObj.getDiv());
    }
}

function initFiltros() {
    let filtrosEl = document.getElementById('filtro_container');

    let filtros = [
        new FiltroGenerico('Nome', 'nome', ''),
        new FiltroGenerico('Departamento', 'depto', ''),
        new FiltroSelect('Titulação', 'titulacao', 'Geral:|Graduação:G|Especialização:E|Mestrado:M|Doutorado:D')
    ];

    for(filtro of filtros)
        filtrosEl.appendChild(filtro.getDiv());

    let aplicar = document.getElementById('aplicar');
    aplicar.addEventListener('click', () => {
        let filtroParams = '';
        for(filtro of filtros) {
            if(filtroParams != '')
                filtroParams += '&';
            filtroParams += filtro.getUrl();
        }
        console.log('filtro params: ' + filtroParams);
        listProfs('?' + filtroParams);
    });

    let reset = document.getElementById('reset');
    reset.addEventListener('click', () => {
        for(filtro of filtros)
            filtro.reset();
    });
}

novoBtn.addEventListener('click', () => showModal('modal/adicionar_professor_form.php'));
initFiltros();
listProfs();
