
function makeRequest(){
	$.ajax({
     url : "cria_emprestimos.php",
     type : 'post',
     data : {
          Id_alunos : $("#id_aluno").val(),
          Id_acervo : $("#id_acervo").val()
    },
    beforeSend : function(){
        $("#status").html("Carregando...");
    }})
	.done(function(msg){
	     $("#status").html(msg);
	})
	.fail(function(jqXHR, textStatus, msg){
	     alert(msg);
	});
}


/*function getXMLHttpRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();  
    }else if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    }
}

function makeRequest(id_aluno, id_acervo) {
    var xmlHttpRequest = getXMLHttpRequest();
    var url = "insert_date.php?Id_alunos="+id_aluno+"&Id_acervo="+id_acervo;
    console.log(url);
    xmlHttpRequest.open("GET", url, true);
    xmlHttpRequest.onreadystatechange = getReadyStateHandler(xmlHttpRequest);
    xmlHttpRequest.send(null);
}

function getReadyStateHandler(xmlHttpRequest) {;
    return function() {
        if (xmlHttpRequest.readyState === 4) {
            if (xmlHttpRequest.status === 200) {
                let statusEl = document.getElementById("status");
                statusEl.innerHTML = xmlHttpRequest.responseText;
            }
        }
    };
}

document.getElementById("confirmar").onclick = function(e) {
	let id_aluno = document.getElementById("id_aluno").value;
    let id_acervo = document.getElementById("id_acervo").value;
	if(id_aluno!="" && id_acervo!=""){
    	makeRequest(id_aluno, id_acervo);
	}
}*/

document.getElementById("confirmar").onclick = function(e){
	makeRequest();
}
