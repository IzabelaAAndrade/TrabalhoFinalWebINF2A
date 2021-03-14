let form = document.querySelector("#formAlterar");
let idTurma;
function sendForm(event){
    event.preventDefault();

    let ajax = new XMLHttpRequest();
    let params = 'idCurso='+document.getElementsByName('idCurso')[0].value+'&nomeTurma='+document.getElementsByName('nomeTurma')[0].value+"&idTurma="+idTurma;
    ajax.open('POST', 'alterar_turma.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            mostraStatus(ajax.responseText);
        }
    }
    ajax.send(params);
}

function mostraStatus(status){
    let resultP = document.querySelector("p#result");

    if(result){
        resultP.innerHTML = "Dados alterados com sucesso.";
    }else{
        resultP.innerHTML = "Erro ao alterar dados.";
    }
}

function getIdTurma(id){
    idTurma = id;
}

form.addEventListener('submit', sendForm, false);
