/*
  Grupo F - desenvolvido por Mayara Mendes
*/

$('#enviar').click(function() {
  let value="";
  $.ajax({
    type: 'string',
    url: '../PHPs/deleta_alunos_bd.php',
    error: function() { alert('Erro ao tentar ação!'); },
    success: function(response) {
      alert(response);
    }
  });
});
