<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$id=$_POST['id'];
$nome=$_POST['nome'];
$nomesCampi = "SELECT nome FROM campi";
$result = mysqli_query(mysqli_connect($dbhost, $dbuser, $dbpass, $dbname), $nomesCampi);
$verificacao = true;

while ($row = mysqli_fetch_assoc($result)) {
    if(strcmp($nome, $row["nome"]) == 0){
        $verificacao = false;
    }
}

if ($verificacao) {
    mysqli_query($con,"UPDATE campi SET nome='$nome' WHERE id='$id'");
}
else {
    echo "<script>alert('Já existe um campus com este nome!');</script>";
}
echo "<script>location.href='campi.php'</script>";
?>
