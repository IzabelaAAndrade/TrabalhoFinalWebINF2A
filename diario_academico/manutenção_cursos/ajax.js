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
	    auxiliar();
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
	    //alert(msg);
	})
	.fail(function(jqXHR, textStatus, msg){
	    //alert(msg);
	});
}

function makeRequestEditar(id){
	$.ajax({
     url : "editar.php",
     type : 'post',
     data : { 
     	id : id
    },
    beforeSend : function(){
        
    }})
	.done(function(msg){
	    $('#exampleModal').modal('show');
	})
	.fail(function(jqXHR, textStatus, msg){
	    //alert(msg);
	});
}


let btn = document.getElementById("btn");

btn.addEventListener("click",function(){
	let op = document.getElementById("op").value;
	if(op=="exclusão" || op=="alteração"){
		makeRequest(op);
	} else {
		$('#exampleModal').modal('show');
	}
});

function remove_row(id){
	makeRequestExcluir(id);
}

function edit_row(id){
	makeRequestEditar(id);
}

function auxiliar(){
	a = document.querySelectorAll("a.excluir");

	for(let i=0; i<a.length; i++){
		a[i].addEventListener("click",apaga_linha);
	}

}

function apaga_linha(e){
	let clicado = e.currentTarget;
	clicado.parentElement.parentElement.remove();
}