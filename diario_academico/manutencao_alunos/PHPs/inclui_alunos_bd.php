<!--
  Insere alunos no bd - MANUNTENÇÃO DE ALUNOS
  Grupo F - desenvolvido por Mayara Mendes
-->

<?php
session_start();

/*********** CONECTANDO AO BANCO DE DADOS ***********/
include_once('../lib/libConnection.php');

/************ OBTENDO OS DADOS DO FORM ************/
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$sexo = $_POST['sexo'];
$data_nasc = $_POST['data_nasc'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = isset($_POST['nome']) ? $_POST['complemento'] : null;
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$uf = $_POST["uf"];
$email = $_POST['email'];
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

      if (!move_uploaded_file($foto['tmp_name'], "../imagens/" . $caminho_foto))
        die("Not uploaded because of error #" . $_FILES["foto"]["error"]);
    } else {
      $_SESSION['insere_aviso'] = 'O arquivo enviado ultrapassa o tamanho máximo permitido de 2MB';
      $caminho_foto = '';
    }
  } else if ($_FILES["foto"]["name"] != '') {
    $_SESSION['insere_aviso'] = 'O tipo de arquivo enviado não é suportado pelo sistema.<br>Altere o arquivo e envie algo no formato jpg, jpeg ou png.';
    $caminho_foto = '';
  }
}

/**************** SALVANDO NO BD ****************/
$query = mysqli_query($conexao, "SELECT * FROM alunos WHERE id = \"$cpf\"");

if (mysqli_num_rows($query) > 0)
  $_SESSION['insere_false'] = "O CPF desse aluno já foi registrado.";
else {
  $aluno = "INSERT INTO alunos (id, nome, sexo, nascimento, logradouro, numero,
                  complemento, bairro, cidade, cep, uf, email, foto)
              VALUES (\"$cpf\", \"$nome\", \"$sexo\", \"$data_nasc\", \"$logradouro\", $numero,
                  \"$complemento\", \"$bairro\", \"$cidade\", \"$cep\", \"$uf\", \"$email\", \"$caminho_foto\")";

  $matricula = "INSERT INTO matriculas (id_alunos, id_disciplinas, ano, ativo)
                VALUES ('$cpf', '0000', '2021', 'S')";

  if (mysqli_query($conexao, $aluno) && mysqli_query($conexao, $matricula))
    $_SESSION['insere_true'] = "Aluno inserido com sucesso!";
  else
    die("Erro: " . mysqli_error($conexao));
}

mysqli_close($conexao);

if(isset($_SESSION['insere_true']))
  header('Location: ../index.php');
else if(isset($_SESSION['insere_false']))
  header('Location: ../formularios/form_inclui_alunos.php');

?>