<?php

include_once('../lib/libConnection.php');

$tipo_acervo = $_GET['acervo'];

$sql = "SELECT * FROM acervo where tipo='$tipo_acervo'";
$result = mysqli_query($conn, $sql) or die("Erro de sql" . mysqli_connect_error());
$table = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Local</th>
        <th>Ano</th>
        <th>Editora</th>
        <th>Paginas</th>
    </tr>
<?php
for ($i = 0; $i < sizeof($table); $i++){
        echo "
    <tr>
        <td>".$table[$i]["id"]."</td>
        <td>".$table[$i]["nome"]."</td>
        <td>".$table[$i]["local"]."</td>
        <td>".$table[$i]["ano"]."</td>
        <td>".$table[$i]["editora"]."</td>
        <td>".$table[$i]["paginas"]."</td>
    </tr>";
}?>
</table>

<!-- 

Alterações:
- Sem border na tabela
- Seleção da data por meio do where do sql (?)

-->