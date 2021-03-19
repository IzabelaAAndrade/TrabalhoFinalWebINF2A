<?php
session_start();
$qual = $_GET['qual'];
$_SESSION['funciona'] = $qual;
$cnx = mysqli_connect("localhost","root","","academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);
$sql = 'select * from turmas';
$resultt = mysqli_query($cnx, $sql);
$tablet = mysqli_fetch_all($resultt);
echo "<form action='editardiscmain.php' method='get'>
      <input type='text' name='id' value='".$table[$qual][0]."'>
      <select name='id_turmas'>";
      for ($i=0; $i < count($tablet); $i++) {
        echo "<option value=".$tablet[$i][0].">".$tablet[$i][0]."</option>";
      }
echo "</select>
  <input type='text' name='nome' value='".$table[$qual][2]."'>
  <input type='number' name='min' value='".$table[$qual][3]."'>
  <input type='submit' value='VAILA'>

</form>
<button name='voltar' onclick='voila()'>Voltar</button><script>function voila(){window.location.href = 'disciplinasindex.php'}</script>";
mysqli_close($cnx);
?>
