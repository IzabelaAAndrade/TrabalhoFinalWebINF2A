<?php
    //Conectando ao Banco de Dados
    include 'conexao.php';

    $idEmprestimos = htmlspecialchars($_GET["idEmprestimo"]);
    $multa = doubleval(htmlspecialchars($_GET["multa"]));

    $query = "UPDATE emprestimos SET Data_devolucao=CURRENT_DATE, Multa=$multa WHERE Id='$idEmprestimos'";
    $result = mysqli_query($conexao, $query);

    if($result!=false){  
        $returnStatus = true;
    }else{
        $returnStatus = false;
    }  
    echo $returnStatus;
    mysqli_close($conexao);
?>