<?php

require("conexao.php");

$id_disciplina = $_POST["disciplina_selecionada"];
$etapa_selecionada = $_POST["etapa_selecionada"];

if($id_disciplina == ""){
    $query = "SELECT * FROM conteudos WHERE id_etapas='$etapa_selecionada' ORDER BY id_disciplinas";
} else if($etapa_selecionada == ""){
    $query = "SELECT * FROM conteudos WHERE id_disciplinas='$id_disciplina' ORDER BY id_etapas";
} else {
    $query = "SELECT * FROM conteudos WHERE id_etapas='$etapa_selecionada' AND id_disciplinas='$id_disciplina'";
}


$resultado_conteudos = mysqli_query($conexao,$query);
$num_conteudos = mysqli_num_rows($resultado_conteudos);

$resultado_disciplina = mysqli_query($conexao, "SELECT nome FROM disciplinas WHERE id='$id_disciplina'");
$row = mysqli_fetch_array($resultado_disciplina);

if($num_conteudos==0){
    echo "<span id='resultado-pesquisa'>Nenhum conteúdo cadastrado para os parâmetros selecionados.</span>";
    die();
}

echo "<div id='conteiner-tabela'>
        <div id='voltar'><a href=''><img src='img/seta-esquerda.png' width='20px' height='20px'></a></div>
        <h2>RELATÓRIO DE CONTEÚDOS: DISCIPLINA ".$row['nome']."</h2><table>
        <thead>
            <th>Etapa</th>
            <th>Disciplina</th>
            <th>Conteúdo</th>
            <th>Data</th>
        </thead>";
while($row_conteudos = mysqli_fetch_array($resultado_conteudos)){
    $etapa = $row_conteudos["id_etapas"];
    $disciplina = $row_conteudos["id_disciplinas"];
    $conteudo = $row_conteudos["conteudos"];
    $data = $row_conteudos["datas"];
    echo "<tr>
            <td>$etapa</td>
            <td>$disciplina</td>
            <td>$conteudo</td>
            <td>$data</td>
        </tr>";
}
echo "</table></div>";


?>