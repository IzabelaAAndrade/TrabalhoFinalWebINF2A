document.getElementById("cancelar").onclick = function(e) {
    document.getElementById("id_aluno").value = "";
    document.getElementById("id_acervo").value = "";
    document.getElementById("status").innerHTML = "";
    desabilita_botoes();
}

document.getElementById("close").onclick = function(e) {
    document.getElementById("status").innerHTML = "";
}

document.getElementById("id_aluno").addEventListener('keyup', function(e){
	desabilita_botoes();
	document.getElementById("status").innerHTML = "";
});

document.getElementById("id_acervo").addEventListener('keyup', function(e){
	desabilita_botoes();
	document.getElementById("status").innerHTML = "";
});

function desabilita_botoes(){
	if(document.getElementById("id_aluno").value=="" && document.getElementById("id_acervo").value==""){
		document.getElementById("cancelar").disabled = true;
	} else {
		document.getElementById("cancelar").disabled = false;
	}

	if(document.getElementById("id_aluno").value=="" || document.getElementById("id_acervo").value==""){
		document.getElementById("confirmar").disabled = true;
	} else {
		document.getElementById("confirmar").disabled = false;
	}
}