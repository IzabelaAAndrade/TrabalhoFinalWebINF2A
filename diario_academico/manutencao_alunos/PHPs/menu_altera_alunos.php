<!--
  Formulário para alterar alunos - MANUNTENÇÃO DE ALUNOS
  Insere na página os itens selecionados no form_altera_alunos.php
  Invoca o php altera_alunos_bd.php
  Grupo F - desenvolvido por Mayara Mendes
-->

<html>
  <head>
    <title>Altera Aluno</title>
    <!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
  </head>

  <body>
    <h1>Altera Aluno</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <!--campos solicitados-->
      <?php
      if(isset($_POST["informacoes"]))
          foreach($_POST["informacoes"] as $informacao)
              echo $informacao;
      ?>
      <input type="submit" value='Enviar' id="enviar">
      <input type="reset" value='Cancelar'><br>
    </form>

    <input type=button value='Voltar' onclick="location.href='../formularios/form_altera_alunos.php';"><br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../JSs/altera_aluno.js"></script>
    <script src="../JSs/mascara_form.js"></script>
  </body>
</html>
