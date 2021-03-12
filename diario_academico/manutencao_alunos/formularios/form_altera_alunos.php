<!--
  Formulário para alterar alunos - MANUNTENÇÃO DE ALUNOS
  Invoca o php menu_altera_alunos
  Grupo F - desenvolvido por Mayara Mendes
-->

<html>
  <head>
    <title>Altera Aluno</title>
    <!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
  </head>

  <body>
    <h1>Altera Aluno</h1>

    <form action="../PHPs/menu_altera_alunos.php" method="post">
      <label>Nome: <input required type="text" name="nome"></label><br>
      <label>CPF: <input required type="text" id="cpf" name="CPF" placeholder="Ex.: 000.000.000-00"></label><br>
      <label>Data de nascimento: <input required type="date" name="data_nasc"></label><br>
      <label>Itens a serem alterados:<br>
          <label><input type=checkbox name='' value='' id='checkTodos'>TODOS<br>

          <label><input type=checkbox name="informacoes[]" value='<label>Nome: <input type="text" name="nome"></label><br>'>Nome<br>
          <label><input type=checkbox name="informacoes[]" value='<label>CPF: <input type="text" id="cpf" name="CPF" placeholder="Ex.: 000.000.000-00"></label><br>'>CPF<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Sexo:
            <input type=radio name=sexo value="Feminino"> Feminino
            <input type=radio name=sexo value="Masculino"> Masculino
          </label><br>'>Sexo<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Data de nascimento: <input required type="date" name="data_nasc"></label><br>'>Data de nascimento<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Logradouro: <input required type="text" name="logradouro"></label><br>'>Logradouro<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Número: <input required type="text" name="numero"></label><br>'>Número<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Complemento: <input type="text" name="complemento"></label><br>'>Complemento<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Bairro: <input required type="text" name="bairro"></label><br>'>Bairro<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Cidade: <input required type="text" name="cidade"></label><br>'>Cidade<br>
          <label><input type=checkbox name="informacoes[]" value='<label>CEP: <input required type="text" id="cep" name="cep" placeholder="Ex.: 00000-000"></label><br>'>CEP<br>
          <label><input type=checkbox name="informacoes[]" value='<label>UF: <select id="UF" name="UF">
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
          </select></label><br>'>UF<br>
          <label><input type=checkbox name="informacoes[]" value='<label>E-mail: <input required type="email" name="nome"></label><br>'>E-mail<br>
          <label><input type=checkbox name="informacoes[]" value='<label>Foto: <input required type="file" name="foto" /></label><br>'>Foto<br>
      </label><br>
      <input type="submit" value='Enviar'>
      <input type="reset" value='Cancelar'><br>
    </form>

    <input type=button value='Voltar' onclick="location.href='../index.php';"><br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="../JSs/altera_aluno.js"></script>
    <script src="../JSs/mascara_form.js"></script>
  </body>
</html>
