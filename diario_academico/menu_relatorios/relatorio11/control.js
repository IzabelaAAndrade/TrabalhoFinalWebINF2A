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