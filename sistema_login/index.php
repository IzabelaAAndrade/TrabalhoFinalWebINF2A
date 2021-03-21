<?php
session_start();
include 'verifica_login.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Inicial</title>
</head>
<body>
<h2> Olá, <?php echo $_SESSION['usuario']; ?> </h2>
<h2><a href="logout.php"></a>Sair</h2>
</body>
</html>

