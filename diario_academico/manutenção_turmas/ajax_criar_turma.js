let form = document.querySelector("#formCriar");
//let idTurma;
function sendForm(event){
    event.preventDefault();
	let ajax = new XMLHttpRequest();
	let params = 'idCurso='+document.getElementsByName('idCurso')[0].value+'&nomeTurma='+document.getElementsByName('nomeTurma')[0].value +document.getElementsByName('idTurma')[0].value;
    ajax.open('POST', 'incluir_turmas.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            mostraStatus(ajax.responseText);
        }
    }
    ajax.send(params);
}

function mostraStatus(status){
    let resultP = document.querySelector("p#result1");

    if(result){
        resultP.innerHTML = "Turma criada com sucesso.";
    }else{
        resultP.innerHTML = "Erro ao criar nova turma.";
    }
}

form.addEventListener('submit', sendForm, false);