btn.addEventListener("click",function(){
    let op = document.getElementById("op").value;
    if(op=="exclusão" || op=="alteração"){	
        makeRequest(op);
    } else { //inserção
        $('#exampleModal').modal('show');
        adiciona_eventos_inserir();
    }
});

function adiciona_eventos_inserir(){
    let btnConfimar = document.getElementById("confirmar");
    btnConfimar.addEventListener("click",function(){
        id_departamento = document.getElementById("id_departamento").value;
        nome = document.getElementById("nome").value;
        total_horas = document.getElementById("total_horas").value;
        modalidade = document.getElementById("modalidade").value;
        
        makeRequestCriar(id_departamento, nome, total_horas, modalidade);
        
    });
}

function makeRequestCriar(id_departamento, nome, total_horas, modalidade){
    $.ajax({
        url : "criar.php",
        type : 'post',
        data : {
            id_departamento : id_departamento,
            nome : nome,
            total_horas : total_horas,
            modalidade : modalidade
        },
        beforeSend : function(){
            
        }})
        .done(function(msg){
            document.getElementById("status").innerHTML = msg;
        })
        .fail(function(jqXHR, textStatus, msg){
            document.getElementById("status").innerHTML = msg;
        });
}