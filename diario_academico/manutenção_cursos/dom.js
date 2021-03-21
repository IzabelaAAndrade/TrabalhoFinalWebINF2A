document.getElementById("cancelar").onclick = function(e) {
    document.getElementById("id_departamento").value = "";
	document.getElementById("nome").value = "";
    document.getElementById("total_horas").value = "";
	document.getElementById("modalidade").value = "";
    document.getElementById("status").innerHTML = "";
    desabilita_botoes();
}

document.getElementById("close2").onclick = function(e) {
	document.getElementById("id_departamento").value = "";
	document.getElementById("nome").value = "";
    document.getElementById("total_horas").value = "";
	document.getElementById("modalidade").value = "";
    document.getElementById("status").innerHTML = "";
	desabilita_botoes();
}

document.getElementById("id_departamento").addEventListener('keyup', function(e){
	desabilita_botoes();
	document.getElementById("status").innerHTML = "";
});

document.getElementById("nome").addEventListener('keyup', function(e){
	desabilita_botoes();
	document.getElementById("status").innerHTML = "";
});

document.getElementById("total_horas").addEventListener('keyup', function(e){
	desabilita_botoes();
	document.getElementById("status").innerHTML = "";
});

document.getElementById("modalidade").addEventListener('keyup', function(e){
	desabilita_botoes();
	document.getElementById("status").innerHTML = "";
});

function desabilita_botoes(){
	if(document.getElementById("id_departamento").value=="" && document.getElementById("nome").value == "" && document.getElementById("total_horas").value == "" && document.getElementById("modalidade").value == ""){
		document.getElementById("cancelar").disabled = true;
	} else {
		document.getElementById("cancelar").disabled = false;
	}

	if(document.getElementById("id_departamento").value=="" || document.getElementById("nome").value == "" || document.getElementById("total_horas").value == "" || document.getElementById("modalidade").value == ""){
		document.getElementById("confirmar").disabled = true;
	} else {
		document.getElementById("confirmar").disabled = false;
	}
}