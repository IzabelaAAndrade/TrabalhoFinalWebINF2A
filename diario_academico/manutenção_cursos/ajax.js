function makeRequest(op){
	$.ajax({
     url : "control.php",
     type : 'post',
     data : {
     	opcao : op
    },
    beforeSend : function(){
        $("#listagem").html("Carregando...");
    }})
	.done(function(msg){
	    $("#listagem").html(msg);
	    $('#modal').modal('show');
	    aciona_eventos_remove_row();
	    edit_row();
	})
	.fail(function(jqXHR, textStatus, msg){
	     alert(msg);
	});
}

function makeRequestExcluir(id){

	$.ajax({
     url : "excluir.php",
     type : 'post',
     data : { 
     	id : id
    },
    beforeSend : function(){
        
    }})
	.done(function(msg){
	    alert(msg);
	})
	.fail(function(jqXHR, textStatus, msg){
	    alert(msg);
	});
}

function makeRequestEditar(id_departamento, nome, total_horas, modalidade){

	$.ajax({
     url : "editar.php",
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
		alert(msg);
	})
	.fail(function(jqXHR, textStatus, msg){
	    alert(msg);
	});
}


function aciona_eventos_remove_row(){
	a = document.querySelectorAll("a.excluir");
	for(let i=0; i<a.length; i++){
		a[i].addEventListener("click",apaga_linha);
	}
}

function edit_row(){
	a = document.querySelectorAll("a.editar");
	for(let i=0; i<a.length; i++){
		a[i].addEventListener("click",recupera_valores);
	}
}

function remove_row(id){
	makeRequestExcluir(id);
}

function apaga_linha(e){
	let clicado = e.currentTarget;
	clicado.parentElement.parentElement.remove();
}

function recupera_valores(e){
	let clicado = e.currentTarget;
	let modalidade = clicado.parentElement.previousElementSibling.firstChild.value;
	let total_horas = clicado.parentElement.previousElementSibling.previousElementSibling.firstChild.value;
	let nome = clicado.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.firstChild.value;
	let id_departamento = clicado.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstChild.value;
	let id = clicado.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstChild.data;
	makeRequestEditar(id, id_departamento, nome, total_horas, modalidade);
}