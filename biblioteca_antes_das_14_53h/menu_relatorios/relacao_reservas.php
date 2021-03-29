<?php
$escolha = $_GET["reservas"];
$data = $_GET["dta_espe"];
$cnx = mysqli_connect("localhost","root","","bibliotecas") or die("Erro de conexão!");
$sql = 'select * from reservas';
$tem = 0;
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);
if($escolha == "geral"){
  echo "<table border='5'>
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
  echo "<table border='5' id='teste'>
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
        echo "<script>document.getElementById('teste').innerHTML = '';document.getElementById('teste').style.border = '0';</script>";
        echo "SEM REGISTRO";
    }
} else {
    echo "DATA INVÁLIDA";
}
mysqli_close($cnx);
?>
