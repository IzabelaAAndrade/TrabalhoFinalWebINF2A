<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once('../lib/libConnection.php');

$tipo_acervo = $_GET['acervo'];

$sql = "SELECT * FROM acervo where tipo='$tipo_acervo'";
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
        <th>Nome</th>
        <th>Local</th>
        <th>Ano</th>
        <th>Editora</th>
        <th>Paginas</th>
    </tr>";
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
}
echo '</table>';

mysqli_close($conn);
}
?>

<!-- 

Alterações:
- Sem border na tabela
- Seleção da data por meio do where do sql (?)

-->