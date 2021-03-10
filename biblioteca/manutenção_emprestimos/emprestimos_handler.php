<?php
    if (isset($_GET["id_aluno"])) {
        $id_aluno = $_GET["id_aluno"];

        /*CONEXÃO COM BANCO DE DADOS*/
        $user = "root";
        $password = "";
        $database = "biblioteca";
        $hostname = "localhost";
        $conexao = mysqli_connect( $hostname, $user, $password) or die ("Erro na conexão."); 
        $query = "USE $database";
        $query_database = mysqli_query($conexao, $query);

        if(!empty($id_aluno)){
            $query = "SELECT `id`,`nome` FROM `alunos` WHERE `id` = $id_aluno";
            $result = mysqli_query($conexao, $query);
            $cont = mysqli_num_rows($result);

            if($cont>0){
                $row = mysqli_fetch_assoc($result);
                $return = $row['id'].":".$row['nome'];

                mysqli_free_result($result);

                $query = "SELECT * FROM `emprestimos` WHERE `Id_alunos` = $id_aluno";
                $result = mysqli_query($conexao, $query);
                $cont = mysqli_num_rows($result);
                
                if($result != false){
                    $returnEmprestimos = "";
                    while($row = mysqli_fetch_assoc($result)){
                        $returnEmprestimos .= $row['Id'].",".$row['Id_alunos'].",".$row['Id_acervo'].",".$row['Data_emprestimo'].",".$row['Data_prev_devol'].",".$row['Data_devolucao'].",".$row['Multa'].",";
                    }
                }else{
                    $returnEmprestimos = "Nenhum empréstimo.";
                }
                    
                $returnRows = $cont;
                mysqli_free_result($result);
            }else{
                $return = "";
                $returnEmprestimos = "";
                $returnRows = 0;
            }
        }
        mysqli_close($conexao);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_emprestimos.css">
    <title>Empréstimos</title>
</head>
<body>
    <main>
        <h1>Empréstimos</h1>
        <div id="busca">
            <form method="GET" action="emprestimos_handler.php">
                <p>ID do aluno: <input type="text" name="id_aluno"><button type="submit"  id="botaoBuscaId"><img src="search_icon.png" width="20" height="20"></button></p>
            </form>
        </div>
        <div id="dadosAluno"></div>
        <div id="emprestimos"></div>
        <button id="criaEmprestimo">+</button>
    </main>
    <script>
        localStorage.setItem("dadosAluno", "<?php echo $return; ?>");
        localStorage.setItem("dadosEmprestimos", "<?php echo $returnEmprestimos; ?>");
        localStorage.setItem("numEmprestimos", "<?php echo $returnRows; ?>");
    </script>
    <script src="mostra_emprestimos.js"></script>
</body>
</html>
