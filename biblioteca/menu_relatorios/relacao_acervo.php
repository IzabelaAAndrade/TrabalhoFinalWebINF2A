<?php
$cnx = mysqli_connect("localhost","root","123456","trabalho_biblioteca") or die("Erro de conexão!");
$tipo_acervo = $_GET['acervo'];
$sql = "SELECT * FROM trabalho_biblioteca.acervo where tipo='$tipo_acervo'";
$result = mysqli_query($cnx, $sql) or die("Erro de sql");
$table = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($cnx);
?>
<table border="5">
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
