function makeRequest(disciplina_selecionada,etapa_selecionada){
    $.ajax({
    url : "control.php",
    type : 'post',
    data : {
        disciplina_selecionada : disciplina_selecionada,
        etapa_selecionada : etapa_selecionada
    },
    beforeSend : function(){
        $("#main").html("Carregando...");
    }})
    .done(function(msg){
        $("#main").html(msg);
        preparaImpressaoPdf();
    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });
}

document.getElementById("botao-enviar").addEventListener("click",function(){
    disciplina_selecionada = document.getElementById("selecionar_disciplina").value;
    etapa_selecionada = document.getElementById("selecionar_etapa").value;
    makeRequest(disciplina_selecionada,etapa_selecionada);
});

function preparaImpressaoPdf(){
    document.getElementById("imprimir").addEventListener("click",function(){
        let div = document.createElement('div');
        div.classList.add('print_div');
        div.innerHTML = document.getElementById("caixa").innerHTML;
        document.body.appendChild(div);
        print();
        div.remove();
    });
}