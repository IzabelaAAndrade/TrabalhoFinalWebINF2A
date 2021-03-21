<?php
session_start();
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login');


if (empty($_POST['email']) || empty($_POST['senha'])) {
    $_SESSION['nao_autenticado'] = 1;
    header('Location: tela_login.php');
    exit();
}

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possivel conectar");

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$query = "SELECT id_usuario, nome, email FROM usuario WHERE email = '" . $email . "' AND senha = md5('" . $senha . "')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result); // a quantidade de linhas da retornadas pela query
mysqli_close($conexao);
if ($row == 1) {
    $_SESSION['usuario'] = $email;
    header('Location: index.php'); // redirecio para a pagina principal
    exit();
} else {
    $_SESSION['nao_autenticado'] = 2;
    header('Locatiion: tela_login.php');
    exit();
}

?>
