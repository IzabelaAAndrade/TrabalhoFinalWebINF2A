<!--
  Formulário para deletar alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php deleta_alunos_bd via ajax
  Grupo F - desenvolvido por Mayara Mendes
-->

<html>
  <head>
    <title>Deleta Aluno</title>
    <!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
  </head>

  <body>
    <h1>Deleta Aluno</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <label>Nome: <input required type="text" name="nome"></label><br>
      <label>CPF: <input required type="text" id="cpf" name="CPF" placeholder="Ex.: 000.000.000-00"></label><br>
      <label>Data de nascimento: <input required type="date" name="data_nasc"></label><br>
      <input type=submit value='Enviar' id="enviar">
      <input type="reset" value='Cancelar'><br>
    </form>

    <input type=button value='Voltar' onclick="location.href='../index.php';"><br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../JSs/mascara_form.js"></script>
    <script src="../JSs/deletar_aluno.js"></script>
    <!--<script>
      $('#enviar').click(function() {
        $.ajax({
          type: 'string',
          url: '../PHPs/deleta_alunos_bd.php',
          error: function() { alert('Erro ao tentar ação!'); },
          success: function(response) {
            alert(response);
          }
        });
      });
    </script>-->
  </body>
</html>
