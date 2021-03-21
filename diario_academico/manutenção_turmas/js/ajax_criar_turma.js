let form = document.querySelector("#formCriar");

function sendForm(event){
    event.preventDefault();

	let ajax = new XMLHttpRequest();
    let nomeTurma = document.getElementsByName('nomeTurmaC')[0].value;
    let idCurso = document.getElementsByName('idCursoC')[0].value;
    let params = 'nomeTurma='+nomeTurma+"&idCurso="+idCurso;

    ajax.open('POST', 'criar_turma.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            let resultP = document.querySelector("p#resultC");
            resultP.innerHTML = ajax.responseText;
        }
    }
    ajax.send(params);  
}

form.addEventListener('submit', sendForm, false);