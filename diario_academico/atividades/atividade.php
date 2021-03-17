<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p><a href="inseriAtividade.html">Inserir Atividade</a></p>
    <p><a href="deletarAtividade.html">Deletar Atividade</a></p>
    <p><a href="alterarAtividade.html">Alterar Atividade</a></p>
    <?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="academico";
    $con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
    $sel = mysqli_select_db($con,$dbname);

    $sql=mysqli_query($con,"SELECT * FROM Atividades") or die(mysqli_error());
    $rows=mysqli_num_rows($sql);
    if($rows>0){
      $result = mysqli_fetch_array($sql);
      echo "<table>";
      echo "<tr>";
      echo "<th></th>";
      echo "</tr>";
        while ($result) {
          echo "<tr>";
          echo '<td>ID: '.$result['id'].'</td><td>'.$result['id_disciplinas'].'</td><td>'.$result['nome'].'</td><td>'.$result['data'].'</td><td>'.$result['valor'].'</td>';
          echo "</tr>";
          $result = mysqli_fetch_array($sql);
        }

        echo "</table>";
    }
    else {
      echo "Nenhuma atividade cadastrado.";
    }
    ?>
  </body>
</html>
