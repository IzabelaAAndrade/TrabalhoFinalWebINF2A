
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Desligamento da Instituição</title>
</head>

<body>

    <h1>Desligamento da Instituição</h1>

    <form method="post" id="formulario" >
        <label>CPF: <input type="text" id="cpf" name="cpf" placeholder="Ex.: 000.000.000-00" data-mask="000.000.000-00"></label>
        <button type="submit" id="enviar">Enviar</button>
    </form>

    <a href="#"><button>Voltar</button></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script>
      $('#enviar').click(function() {
        var dados = $('#formulario').serialize();
        $.ajax({
          type: 'POST',
          url: 'desliga_aluno.php',
          data: dados,
          error: function() { alert('Erro ao tentar ação!'); },
          success: function(response) {
            alert(response);
          }
        });
      });
    </script>
</body>

</html>
