var editar = document.getElementsByClassName('pegar');
for(var i = 0; i < editar.length; i++){
  editar[i].addEventListener('click',clicar);
}
function clicar(e){
  var clicou = e.currentTarget;
  if(clicou.name == 'editar'){
    console.log(clicou.name);
    window.location.href = "editardisc.php?qual="+clicou.value;
  } else {
    window.location.href = "deletardisc.php?qual="+clicou.value;
  }
}
