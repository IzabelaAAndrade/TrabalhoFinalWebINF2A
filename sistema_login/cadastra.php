<?php
    session_start();
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'cadastros');



    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        $_SESSION['cadastrado'] = 1;
        header('Location: tela_cadastro.php');
        exit();
    }

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, /*DB*/) or die("Não foi possivel conectar");

    include 'cria_BD.php';

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']); 
    $email = mysqli_real_escape_string($conexao, $_POST['email']); 
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sqlPesquisa = "SELECT* FROM usuarios WHERE email = '$email';";
    $query = mysqli_query($conexao, $sqlPesquisa);
    $resultado = mysqli_fetch_assoc($query);

    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if(empty($resultado)){ //Caso seja um novo cadatro
        mysqli_query($conexao, $query) or die ("Erro ao cadastrar".mysqli_error($conexao) . "<br>");
        header('Location: tela_cadastro.php');
        $_SESSION['cadastrado'] = 0;
        header('Location: tela_cadastro.php');
        exit();
    }else{ //Caso ja exista o cadastro
        $_SESSION['cadastrado'] = 2;
        header('Location: tela_cadastro.php');
        exit();
    }

    mysqli_close($conexao);

?>