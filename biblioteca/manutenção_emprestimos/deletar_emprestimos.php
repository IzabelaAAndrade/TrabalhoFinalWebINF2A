<?php

if (isset($_GET["id_aluno"])) {
    $id_aluno = $_GET["id_aluno"];

    //Conectando ao Banco de Dados
    $user = "root";
    $password = "";
    $database = "biblioteca";
    $hostname = "localhost";
    $conexao = mysqli_connect( $hostname, $user, $password) or die ("Erro na conexão."); 
    $query = "USE $database";
    $query_database = mysqli_query($conexao, $query);

    $id=$_GET["id_acervo"];
   
    $query = "DELETE FROM emprestimos WHERE id_alunos='$id_aluno' AND id_acervo='$id'";
    $result = mysqli_query($conexao, $query);

    if(mysqli_affected_rows($conexao)>0){
        $_SESSION['msg'] = "<p style='color:green;'>Empréstimo devolvido com sucesso!</p>";
        header("Location: index.php?id_aluno=$id_aluno");
    }
    else{
        echo "<p style='color:red;'>Erro na devolução!</p>";
    }
}

?>