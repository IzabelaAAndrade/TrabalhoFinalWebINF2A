function makeRequest(){
    $.ajax({
    url : "relatorio_certificados.php",
    type : 'post',
    data : {
    },
    beforeSend : function(){
        $("#resultado_container").html("Carregando...");
    }})
    .done(function(msg){
        $("#resultado_container").html(msg);
        adicionaEventos();
    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });
}

makeRequest();

function adicionaEventos(){
    botoes = document.querySelectorAll(".ver");
    for(i=0; i<botoes.length; i++){
        botoes[i].addEventListener("click", function(e){
            btnClicado = e.currentTarget;
            id_aluno = btnClicado.parentElement.parentElement.firstElementChild.innerHTML;
            exibirCertificado(id_aluno);
        });
    }
}


function exibirCertificado(id_aluno){
    $.ajax({
    url : "gera_certificados.php",
    type : 'post',
    data : {
        id_aluno : id_aluno
    },
    beforeSend : function(){
        $("#resultado_container").html("Carregando...");
    }})
    .done(function(msg){
        $("#resultado_container").html(msg);
        preparaImpressaoPdf();
    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });
}

function preparaImpressaoPdf(){
    document.getElementById("imprimir").addEventListener("click",function(){
        let div = document.createElement('div');
        div.classList.add('print_div');
        document.querySelector("#imprimir").style.display = "none";
        div.innerHTML = document.getElementById("caixa").innerHTML;
        document.body.appendChild(div);
        print();
        div.remove();
        document.querySelector("#imprimir").style.display = "block";
    });
}