let form = document.querySelector("#formBusca");

function sendForm(event){
    event.preventDefault();

    let ajax = new XMLHttpRequest();
    let params = 'busca='+document.getElementsByName('busca')[0].value;
    ajax.open('POST', 'search_turmas.php');
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function(){
        if(ajax.status===200 && ajax.readyState===4){
            let result = document.querySelector(".divTabela");
            result.innerHTML = ajax.responseText;

        }
    }
    ajax.send(params);
}

form.addEventListener('submit', sendForm, false);
