<?php

//require_once("config.php");
//Olhar com a gerencia

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="academico";
$con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
$sel = mysqli_select_db($con,$dbname);

$nome=$_POST['nome'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];

$nomesCampi = "SELECT nome FROM campi";
$result = mysqli_query(mysqli_connect("localhost", "root", "", "academico"), $nomesCampi);
$verificacao = true;

while ($row = mysqli_fetch_assoc($result)) {
    if(strcmp($nome, $row["nome"]) == 0){
        $verificacao = false;
    }
}

if ($verificacao) {
    mysqli_query($con,"INSERT INTO campi(nome,cidade,uf) VALUES ('$nome','$cidade','$uf')");
}
else {
    echo "<script>alert('Não é possível inserir dois campi com o mesmo nome!');</script>";
}
echo "<script>location.href='campi.php'</script>";
?>
