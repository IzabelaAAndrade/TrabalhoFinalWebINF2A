let dadosAluno;
let dadosEmprestimos;
let numEmprestimos;
let emprestimos = [];

if(localStorage.getItem("dadosAluno")!=null){
    dadosAluno = localStorage.getItem("dadosAluno");
    dadosEmprestimos = localStorage.getItem("dadosEmprestimos");
    numEmprestimos = localStorage.getItem("numEmprestimos");
    emprestimos = [];

    localStorage.clear();
        if(mostraDadosAluno()){
        constroiArrayEmprestimos();
        mostraEmprestimos();
    }else{
        let alunoNaoEncontradoParagrafo = document.createElement("p");
        alunoNaoEncontradoParagrafo.id = "alunoNaoEncontrado";
        alunoNaoEncontradoParagrafo.innerHTML = "Nenhum aluno com este ID encontrado.";
        document.getElementById("dadosAluno").appendChild(alunoNaoEncontradoParagrafo);
    }
}

let botoes = document.querySelectorAll('button.btnDevolver');

function mostraDadosAluno() {
    if(dadosAluno!=""){
        dadosAluno = dadosAluno.split(":");
        let id = dadosAluno[0];
        let nome = dadosAluno[1];

        let nomeParagrafo = document.createElement("p");
        nomeParagrafo.id = "nomeAluno";
        nomeParagrafo.innerHTML = nome;
        document.getElementById("dadosAluno").appendChild(nomeParagrafo); 

        let idParagrafo = document.createElement("p");
        idParagrafo.id = "idAluno";
        idParagrafo.innerHTML = "ID: "+id;
        document.getElementById("dadosAluno").appendChild(idParagrafo);

        return true;
    }else{
        return false;
    }
    
}

function constroiArrayEmprestimos(){
    dadosEmprestimos = dadosEmprestimos.split(",");
    let cont = 0;
    
    for(let i=0;i<numEmprestimos;i++){
        emprestimo =  {
            idEmprestimo: dadosEmprestimos[cont++],
            idAluno: dadosEmprestimos[cont++],
            idAcervo: dadosEmprestimos[cont++],
            dataEmprestimo: dadosEmprestimos[cont++],
            dataPrevDevolucao: dadosEmprestimos[cont++],
            dataDevolucao: dadosEmprestimos[cont++],
            multa: dadosEmprestimos[cont++]
        }
    
        emprestimos.push(emprestimo);
    }
}

function mostraEmprestimos() {
    for(let i=0; i<emprestimos.length; i++){
        let divEmprestimo = document.createElement("div");
        divEmprestimo.id = "emprestimo"+i;
        divEmprestimo.classList.add("emprestimo");
        document.getElementById("emprestimos").appendChild(divEmprestimo);
    
        let idEmprestimoParagrafo = document.createElement("p");
        idEmprestimoParagrafo.innerHTML = "ID: "+emprestimos[i].idEmprestimo;
        document.getElementById("emprestimo"+i).appendChild(idEmprestimoParagrafo);
        
        let idAcervoParagrafo = document.createElement("p");
        idAcervoParagrafo.innerHTML = "ID do Acervo: "+emprestimos[i].idAcervo;
        document.getElementById("emprestimo"+i).appendChild(idAcervoParagrafo);
    
        let dataEmpresParagrafo = document.createElement("p");
        dataEmpresParagrafo.innerHTML = "Data de Empréstimo: "+formataData(emprestimos[i].dataEmprestimo);
        document.getElementById("emprestimo"+i).appendChild(dataEmpresParagrafo);
    
        let dataPrevEmpresParagrafo = document.createElement("p");
        dataPrevEmpresParagrafo.innerHTML = "Data Prevista para Devolução: "+formataData(emprestimos[i].dataPrevDevolucao);
        document.getElementById("emprestimo"+i).appendChild(dataPrevEmpresParagrafo);
    
        let atrasoParagrafo = document.createElement("p");
        if(calculaAtraso(emprestimos[i].dataPrevDevolucao)){
            atrasoParagrafo.innerHTML = "Entrega em atraso";
        }else{
            atrasoParagrafo.innerHTML = " ";
        }
        document.getElementById("emprestimo"+i).appendChild(atrasoParagrafo);
        
        let btnDevolver = document.createElement("button");
        btnDevolver.innerHTML = "Devolver";
        btnDevolver.id = "btnDevolver"+i;
        btnDevolver.classList.add("btnDevolver","btn");
        btnDevolver.setAttribute("data-bs-toggle","modal");
        btnDevolver.setAttribute("data-bs-target","#devolucaoModal");
        document.getElementById("emprestimo"+i).appendChild(btnDevolver);

    }
    if(emprestimos.length==0){
        let nenhumEmprestimoParagrafo = document.createElement("p");
        nenhumEmprestimoParagrafo.id = "nenhumEmprestimo";
        nenhumEmprestimoParagrafo.innerHTML = "Nenhum empréstimo";
        document.getElementById("emprestimos").appendChild(nenhumEmprestimoParagrafo);
    }
}

function calculaAtraso(data) {
    data = data.split("-");
    data[1] = parseInt(data[1],10)-1;  
    let dataPrevEntrega = new Date(data[0],data[1],data[2]);
    let dataAtual = new Date();

    if(dataPrevEntrega < dataAtual){
        return true;
    }else{
        return false;
    }
}

function formataData(data){
    data = data.split("-");

    return data[2]+"/"+data[1]+"/"+data[0];
}

function toStringEmprestimo(indice){
    let retorno = emprestimos[indice].idEmprestimo+","+emprestimos[indice].idAcervo+","+emprestimos[indice].dataPrevDevolucao;
    return retorno;
}

function calculaMulta(data){
    data = data.split("/");
    data[1] = parseInt(data[1],10)-1;  
    let dataPrevEntrega = new Date(data[2],data[1],data[0]);
    let dataAtual = new Date();

    let Difference_In_Time = dataAtual.getTime()-dataPrevEntrega.getTime();
    let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    Difference_In_Days = Math.round(Difference_In_Days);

    if(Difference_In_Days>0){
        let multa = (Difference_In_Days-1)*0.25;
        
        return multa.toFixed(2);
    }else{
        return 0;
    }
}

for(let j=0;j<botoes.length;j++){
    document.getElementById("btnDevolver"+j).addEventListener("click", () => {
        document.getElementById('pIdEmprestimo').innerHTML = emprestimos[j].idEmprestimo;
        document.getElementById('pDataPrevDevolucao').innerHTML = formataData(emprestimos[j].dataPrevDevolucao);
        document.getElementById('pMulta').innerHTML = "R$"+calculaMulta(formataData(emprestimos[j].dataPrevDevolucao));
    });
}