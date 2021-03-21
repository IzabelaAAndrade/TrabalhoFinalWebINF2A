let formAlterar = document.querySelector("#formAlterar");
let idTurma;

function sendForm(event){
    event.preventDefault();

    let ajax = new XMLHttpRequest();
    let params = 'idCurso='+document.getElementsByName('idCurso')[0].value+'&nomeTurma='+document.getElementsByName('nomeTurma')[0].value+"&idTurma="+idTurma;
    ajax.open('POST', 'alterar_turma.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            document.querySelector("p#resultA").innerHTML = ajax.responseText;
        }
    }
    ajax.send(params);
}

function getIdTurma(id){
    idTurma = id;
}

formAlterar.addEventListener('submit', sendForm, false);
