<?php
$cnx = mysqli_connect("localhost","root","123456","trabalho_biblioteca") or die("Erro de conexão!");
$sql = "SELECT * FROM trabalho_biblioteca.emprestimos where Data_devolucao is null";
$result = mysqli_query($cnx, $sql) or die("Erro de sql");
$table = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($cnx);
print_r($table);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Relatório de empréstimos</title>
    <style>
    td{
        text-align:center;
    }
    </style>
</head>
<body>
<h1>Relatório de do Acervo</h1>
<table border="5">
    <tr>
        <th>ID</th>
        <th>Id do Aluno</th>
        <th>Id do acervo</th>
        <th>Data de empréstimo</th>
        <th>Devolução prevista</th>
        <th>Devloução</th>
        <th>Multa</th>
    </tr>
    <?php
    for ($i = 0; $i < sizeof($table); $i++){
        echo "
        <tr>
        <td>".$table[$i]["Id"]."</td>
        <td>".$table[$i]["Id_alunos"]."</td>
        <td>".$table[$i]["Id_acervo"]."</td>
        <td>".$table[$i]["Data_emprestimo"]."</td>
        <td>".$table[$i]["Data_prev_devol"]."</td>
        <td>".$table[$i]["Data_devolucao"]."</td>
        <td>".$table[$i]["multa"]."</td>
        </tr>";
    }?>
</table>
</body>
</html>
