var editar = document.getElementsByName('btn');
for(var i = 0; i < editar.length; i++){
  editar[i].addEventListener('click',clicar);
}
function clicar(e){
  var clicou = e.currentTarget;
  if(clicou.className == 'btnAlterar'){
    $.get("editar_disciplinas.php", "qual="+clicou.value, function(resposta){
      document.getElementById('edita_modal').innerHTML = resposta;
    });
    $("#editardisc").modal({
     show: true
    });
  }else {
    window.location.href = "deletar_disciplinas.php?qual="+clicou.value;
  }
}
