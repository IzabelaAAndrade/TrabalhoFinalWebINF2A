<?php

Header("Content-type: text/html; charset=utf-8");

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_DATABASE","academico");

// Conexão com o localhost
$link = mysqli_connect("localhost", "root", "");
if (!$link)
    die("Conexão falhou: " . mysqli_connect_error());
    
// Conexão com o BD
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$link) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Seleciona o BD para uso
if (mysqli_query($link, 'USE ' . DB_DATABASE))
    printf("Sucesso: Banco de Dados 'professores' foi usado.<br>");
else
    printf("Erro ao usar BD: ".mysqli_error($link));

// Insere dados na tabela Professores
$nome = $_POST['nome'];
$id = $_POST['id'];
$id_depto = $_POST['id_depto'];
$titulacao = $_POST['titulacao'];

$sql = "INSERT INTO `professores` (`id`, `id_depto`, `nome`,`titulacao`) VALUES
('$id', $id_depto, '$nome', '$titulacao')";

if ($result = mysqli_query($link, $sql))
    echo "Novo registro criado na tabela \"Professores\".<br>";
else
    echo "Erro: " . $sql . "<br>" . $link->error;

?>