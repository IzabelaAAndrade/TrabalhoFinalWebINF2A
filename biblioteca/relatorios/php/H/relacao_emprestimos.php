<?php

include_once('../lib/libConnection.php');

$sql = "SELECT * FROM emprestimos";
$result = mysqli_query($conn, $sql) or die("Erro de sql");
$table = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>
<table>
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

<!-- 

Alterações:
remover o 'where Data_devolucao is null'
trocar trabalho_biblioteca por biblioteca
acessar diretamente a tabela em vez de trabalho_biblioteca.tabela
remover print_r($table);

 -->
