<!--
  Altera alunos do bd - MANUNTENÇÃO DE ALUNOS
  Grupo F - desenvolvido por Tássyla Lissa Lima
-->

<?php
session_start();

/*********** CONECTANDO AO BANCO DE DADOS ***********/
include_once('../../lib/libConnection.php');

/************* OBTENDO OS DADOS DO FORM *************/
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$data_nascimento = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$uf = isset($_POST['uf']) ? $_POST['uf'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

$foto = isset($_FILES["foto"]) ? $_FILES["foto"] : '';

/*************** SALVANDO A IMAGEM ***************/
//Adaptado de https://pequenasduvidas.com/criando-um-simples-script-de-upload-com-validacoes-de-arquivo-em-php/
//verifica se algum arquivo foi enviado
if (count($_FILES) > 0) {

  //recupera informações do arquivo
  $tam_arq = $_FILES['foto']['size'];
  $tp_arq = $_FILES['foto']['type'];

  //verifica se o arquivo enviado é uma imagem
  if ($tp_arq == 'image/jpeg' || $tp_arq == 'image/jpg' || $tp_arq == 'image/png') {
    $ext = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));

    //verifica o tamanho do arquivo (não pode ultrapassar 2 Mb)
    if ($tam_arq <= 2097152) {
      $nome_foto = time();
      $caminho_foto = $nome_foto . "." . $ext;

      if (!move_uploaded_file($foto['tmp_name'], "../../imagens/" . $caminho_foto))
        die("Not uploaded because of error #" . $_FILES["foto"]["error"]);
    } else
        $_SESSION['insere_aviso'] = 'O arquivo enviado ultrapassa o tamanho máximo permitido (2Mb)';
  } else if($_FILES["foto"]["name"]!='')
      $_SESSION['insere_aviso'] = 'O tipo de arquivo enviado não é suportado pelo sistema.<br>Envie um arquivo no formato jpg, jpeg ou png.';
}

/**************** SALVANDO NO BD ****************/
$query = mysqli_query($conexao, "SELECT * FROM alunos WHERE id = '$cpf'");
if (mysqli_num_rows($query) == 1) {
  if ($nome != null)
    mysqli_query($conexao, "UPDATE alunos SET nome = '$nome' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($sexo != null)
    mysqli_query($conexao, "UPDATE alunos SET sexo = '$sexo' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($data_nascimento != null)
    mysqli_query($conexao, "UPDATE alunos SET nascimento = '$data_nascimento' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($logradouro != null)
    mysqli_query($conexao, "UPDATE alunos SET logradouro = '$logradouro' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($numero != null)
    mysqli_query($conexao, "UPDATE alunos SET numero = '$numero' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($complemento != null)
    mysqli_query($conexao, "UPDATE alunos SET complemento = '$complemento' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($bairro != null)
    mysqli_query($conexao, "UPDATE alunos SET bairro = '$bairro' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($cidade != null)
    mysqli_query($conexao, "UPDATE alunos SET cidade = '$cidade' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($cep != null)
    mysqli_query($conexao, "UPDATE alunos SET cep = '$cep' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($uf != null)
    mysqli_query($conexao, "UPDATE alunos SET uf = '$uf' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if ($email != null)
    mysqli_query($conexao, "UPDATE alunos SET email = '$email' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  if (isset($caminho_foto)) {
    $array = mysqli_fetch_array(mysqli_query($conexao, "SELECT `foto` FROM `alunos` WHERE `id` = '$cpf'"));
    unlink("../../imagens/" . $array['foto']);
    mysqli_query($conexao, "UPDATE alunos SET foto = '$caminho_foto' WHERE id = '$cpf'") or die("Erro: " . mysqli_error($conexao));
  }
  $_SESSION['altera_true'] = "Dados atualizados com sucesso.";
} else
    $_SESSION['altera_false'] = "Falha ao atualizar os dados.";

/*********** FECHANDO CONEXÃO AO BANCO DE DADOS ***********/
mysqli_close($conexao);

if (isset($_SESSION['altera_true']))
  header('Location: ../../index.php');
else if (isset($_SESSION['altera_false']))
  header('Location: ../../formularios/altera/form_confere_dados.php');

?>