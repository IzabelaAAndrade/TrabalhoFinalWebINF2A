<?php
session_start();
$qual = $_GET['qual'];
$_SESSION['funciona'] = $qual;
$cnx = mysqli_connect("localhost", "root", "", "academico") or die("Erro de conexão!");
$sql = 'select * from disciplinas where id = "' . $qual . '"';
$result = mysqli_query($cnx, $sql);
$table = mysqli_fetch_all($result);
$sql = 'select * from turmas';
$resultt = mysqli_query($cnx, $sql);
$tablet = mysqli_fetch_all($resultt);
echo "<form action='editar_disciplinas_logica.php' method='get'>";
echo "<p id='idt_antigo'>ID da Turma antiga: " . $table[0][1] . " </p>";
echo "<select name='id_turmas' class='caixa-seleção'><option value='-1'>ID da Turma</option>";
for ($i = 0; $i < count($tablet); $i++) {
    echo "<option value=" . $tablet[$i][0] . ">" . $tablet[$i][0] . "</option>";
}
echo "</select>
  <input class='modal_input' type='text' name='nome' value='" . $table[0][2] . "'>
  <input class='modal_input' type='number' name='min' value='" . $table[0][3] . "'>
  <input class='botoes' type='submit' value='Alterar'>

</form>";
mysqli_close($cnx);
?>
