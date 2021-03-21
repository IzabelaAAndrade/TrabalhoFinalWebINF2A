<?php
include 'conexao_bd.php';
global $conexao;
$query = "SELECT * FROM disciplinas";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
if ($row > 0) {
echo "<table class='table'>";

    echo "<thead>";

    echo "<tr>";

        echo "<th>Id</th>";
        echo "<th>Id_turmas</th>";
        echo "<th>Nome</th>";
        echo "<th>Carga_horaria_min</th>";
        echo "<th></th>";
        echo "<th></th>";

        echo "</tr>";

    echo "</thead>";

    echo "<tbody>";


    while ($linha = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        echo "<td>" . $linha['id'] . "</td>";
        echo "<td>" . $linha['id_turmas'] . "</td>";
        echo "<td>" . $linha['nome'] . "</td>";
        echo "<td>" . $linha['carga_horaria_min'] . "</td>";
        echo "<td><button name='btn' onclick='' class='btnAlterar'  value='" . $linha['id'] . "'>Editar</button>" . "</td>";
        echo "<td><button name='btn' class='btnDeletar'  value = '" . $linha['id'] . "' >Deletar</button>" . "</td>";

        echo "</tr>";
    }

    echo "</tbody>";

    echo "</table>";
}
?>