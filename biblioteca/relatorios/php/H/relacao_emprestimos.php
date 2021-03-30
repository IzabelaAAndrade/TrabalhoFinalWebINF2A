<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//*/
Error_reporting(0);

include_once('../lib/libConnection.php');

$sql = "SELECT * FROM emprestimos";
$result = mysqli_query($conn, $sql);

if(!$result) {
    echo 'Erro ao recuperar os registros: ' . mysqli_error($conn);
}
else if(mysqli_num_rows($result) == 0) {
    echo 'Nenhum registro encontrado!';
}
else {
$table = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "
<table>
<tr>
<th>ID</th>
<th>Id do Aluno</th>
<th>Id do acervo</th>
<th>Data de empréstimo</th>
<th>Devolução prevista</th>
<th>Devloução</th>
<th>Multa</th>
</tr>";
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
}
echo "</table>";
}

mysqli_close($conn);
?>

<!-- 

Alterações:
remover o 'where Data_devolucao is null'
trocar trabalho_biblioteca por biblioteca
acessar diretamente a tabela em vez de trabalho_biblioteca.tabela
remover print_r($table);

 -->
