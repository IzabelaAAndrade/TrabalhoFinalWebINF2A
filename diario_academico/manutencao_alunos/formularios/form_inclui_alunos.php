<!--
  Formulário para inserir alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php inclui_alunos_bd via ajax
  Grupo F - desenvolvido por Mayara Mendes
-->

<html>
  <head>
    <title>Inclui Aluno</title>
    <!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
  </head>

  <body>
    <h1>Inclui Aluno</h1>
    <form action="" method="post" enctype="multipart/form-data">

      <label>Nome: <input type="text" name="nome"></label><br>
      <label>CPF: <input type="text" id="cpf" name="CPF" placeholder="Ex.: 000.000.000-00"></label><br>
      <label>Sexo:
        <input type=radio name=sexo value="Feminino"> Feminino
        <input type=radio name=sexo value="Masculino"> Masculino
      </label><br>
      <label>Data de nascimento: <input type="date" name="data_nasc"></label><br>

      <label>Logradouro: <input type="text" name="logradouro"></label><br>
      <label>Número: <input type="text" name="numero"></label><br>
      <label>Complemento: <input type="text" name="complemento"></label><br>
      <label>Bairro: <input type="text" name="bairro"></label><br>
      <label>Cidade: <input type="text" name="cidade"></label><br>
      <label>CEP: <input type="text" id="cep" name="cep" placeholder="Ex.: 00000-000"></label><br>

      <label>UF: <select id="UF" name="UF">
        <!--blogson.com.br/lista-de-todos-os-estados-option-select-html/-->
        <option value="">Selecione</option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MS">MS</option>
        <option value="MT">MT</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
      </select></label><br>

      <label>E-mail: <input type="email" name="nome"></label><br>

      <label>Foto: <input type="file" name="foto" /></label><br>

      <input type=submit value='Enviar' id="enviar">
      <input type="reset" value='Cancelar'><br>
    </form>
    <input type=button value='Voltar' onclick="javascript: location.href='../index.php';"><br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../JSs/inclui_aluno.js"></script>
    <script src="../JSs/mascara_form.js"></script>
  </body>
</html>
