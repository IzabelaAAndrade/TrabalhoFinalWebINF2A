let btnConfirma = document.getElementById("confirmaDevolucao");

function sendForm(event){
    event.preventDefault();

    let idEmprestimo = document.getElementById('pIdEmprestimo').innerHTML;
    let multa = document.getElementById('pMulta').innerHTML;
    
    let ajax = new XMLHttpRequest();
    ajax.open('GET', 'deletar_emprestimos.php?idEmprestimo='+idEmprestimo+"&multa="+multa);
    ajax.setRequestHeader('Content-type', 'text/plain');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            mostraStatus(ajax.responseText);
        }
    }
    ajax.send();
    document.getElementById('confirmaDevolucao').setAttribute('disabled', "true");
    document.getElementById('cancelarDevolucao').setAttribute('disabled', "true");

}

function mostraStatus(status){
    let resultP = document.querySelector("p#result");

    if(status){
        resultP.innerHTML = "Devolução concluída com sucesso.";
    }else{
        resultP.innerHTML = "Erro ao efetuar devolução.";
    }
}

btnConfirma.addEventListener("click", sendForm,false);
