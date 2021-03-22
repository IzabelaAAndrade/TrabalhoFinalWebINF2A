let btnConfirma = document.getElementById("confirmaDeletar");

function sendForm(event){
    event.preventDefault();

    let idTurma = document.getElementById('idTurmaD').innerHTML;  
    let ajax = new XMLHttpRequest();

    ajax.open('GET', 'deletar_turma.php?idTurma='+idTurma);
    ajax.setRequestHeader('Content-type', 'text/plain');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            mostraStatus(ajax.responseText);
        }
    }
    ajax.send();
    document.getElementById('confirmaDeletar').setAttribute('disabled', "true");
}

function mostraStatus(status){
    let resultP = document.querySelector("p#resultD");
    resultP.innerHTML = status;   
}

btnConfirma.addEventListener("click", sendForm,false);
