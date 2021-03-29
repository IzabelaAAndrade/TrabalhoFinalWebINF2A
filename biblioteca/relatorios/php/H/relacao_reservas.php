<?php

include_once('../lib/libConnection.php');

$escolha = $_GET["reservas"];
$data = $_GET["dta_espe"];
$sql = 'select * from reservas';
$tem = 0;
$result = mysqli_query($conn, $sql);

if(!$result) {
  echo 'Erro ao recuperar os registros: ' . mysqli_error($conn);
}
else if(mysqli_num_rows($result) == 0) {
  echo 'Nenhum registro encontrado!';
}
else {

$table = mysqli_fetch_all($result);
if($escolha == "geral"){
  echo "<table>
      <tr>
      <th>ID</th>
      <th>ID do Aluno</th>
      <th>ID do Acervo</th>
      <th>Data de reserva</th>
      <th>Tempo de Espera</th>
      <th>Emprestou</th>
      </tr>";
    for($i = 0; $i < count($table); $i++){
      echo "
      <tr>
      <td>".$table[$i][0]."</td>
      <td>".$table[$i][1]."</td>
      <td>".$table[$i][2]."</td>
      <td>".$table[$i][3]."</td>
      <td>".$table[$i][4]."</td>
      <td>".$table[$i][5]."</td>
      </tr>";
    }
    echo "</table>";
} else if($data != null){
  echo "<table id='teste'>
      <tr>
      <th>ID</th>
      <th>ID do Aluno</th>
      <th>ID do Acervo</th>
      <th>Data de reserva</th>
      <th>Tempo de Espera</th>
      <th>Emprestou</th>
      </tr>";
    for($i = 0; $i<count($table); $i++){
        if($table[$i][3] == $data){
            $tem++;
            echo "
            <tr>
            <td>".$table[$i][0]."</td>
            <td>".$table[$i][1]."</td>
            <td>".$table[$i][2]."</td>
            <td>".$table[$i][3]."</td>
            <td>".$table[$i][4]."</td>
            <td>".$table[$i][5]."</td>
            </tr>";
        }
        echo "</table>";
    } if ($tem <= 0){
        echo "<script>document.getElementById('teste').remove();</script>";
        echo "SEM REGISTRO";
    }
} else {
    echo "DATA INVÁLIDA";
}

}

mysqli_close($conn);

?>

<!-- 

Alterações:
- Sem border na tabela
- Seleção da data por meio do where do sql (?)

-->


