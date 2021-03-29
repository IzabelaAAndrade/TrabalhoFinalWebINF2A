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
echo "<label for='id_turmas'>Id da turma referente:</label><select name='id_turmas' class='caixa-seleção'><option value='-1'>ID da Turma</option>";
for ($i = 0; $i < count($tablet); $i++) {
    echo "<option value=" . $tablet[$i][0] . ">" . $tablet[$i][0] . "</option>";
}
echo "</select>
  <label for='modal_input'>Nome da Disciplina:</label>
  <input class='modal_input' type='text' name='nome' value='" . $table[0][2] . "'>
  <label for='modal_input'>Horário total em Minutos:</label>
  <input class='modal_input' type='number' name='min' value='" . $table[0][3] . "'>
  <div class='botoes'>
  <input id='btn_1' class='btn btn-default' type='submit' value='Cadastar'>
  <button id ='btn_2' type='button' class='btn btn-default' data-dismiss='modal' onclick='location.reload(true);'>Cancelar</button>
  </div>
</form>";
mysqli_close($cnx);
?>
