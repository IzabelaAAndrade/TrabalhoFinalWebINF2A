let botoesDeletar = document.querySelectorAll('.btnDeletar');

for(let botao of botoesDeletar){
    botao.addEventListener("click", (e)=>{
      let id = e.target.id;
      id = id.replace("btnDeletar","");
      document.querySelector("#idTurmaD").innerHTML = id;
      document.querySelector('#nomeTurmaD').innerHTML = document.querySelector("#campoNome"+id).innerHTML;
    });
}