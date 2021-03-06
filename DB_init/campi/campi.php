<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p><a href="inseriCampi.html">Inserir Campi</a></p>
    <p><a href="deletarCampi.html">Deletar Campi</a></p>
    <p><a href="alterarCampi.html">Alterar Campi</a></p>
    <?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="academico";
    $con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
    $sel = mysqli_select_db($con,$dbname);

    $sql=mysqli_query($con,"SELECT * FROM campi") or die(mysqli_error());
    $rows=mysqli_num_rows($sql);
    if($rows>0){
      $result = mysqli_fetch_array($sql);
      echo "<table>";
      echo "<tr>";
      echo "<th></th>";
      echo "</tr>";
        while ($result) {
          echo "<tr>";
          echo '<td>ID: '.$result['id'].'</td><td>'.$result['nome'].'</td><td>'.$result['cidade'].'</td><td>'.$result['uf'].'</td>';
          echo "</tr>";
          $result = mysqli_fetch_array($sql);
        }

        echo "</table>";
    }
    else {
      echo "Nenhum campus cadastrado.";
    }
    ?>
  </body>
</html>
