<?php
include 'conect_bd.php';

echo "<h2>Cursos</h2>";
$sql = "SELECT id, nome FROM cursos";
$resultado = mysqli_query($connection, $sql);

$coluna = mysqli_fetch_array($resultado);
echo  "<a href=exibir_turmas.php?id=".$coluna["id"].">".$coluna["nome"]."</a>" ;

mysqli_close($connection);

?>
