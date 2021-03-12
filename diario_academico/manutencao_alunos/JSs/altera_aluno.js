/*
  Grupo F - desenvolvido por Mayara Mendes
*/

$("#checkTodos").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

$('#enviar').click(function() {
  let value="";
  $.ajax({
    type: 'string',
    url: '../PHPs/altera_alunos_bd.php',
    error: function() { alert('Erro ao tentar ação!'); },
    success: function(response) {
      alert(response);
    }
  });
});
