<?php
    $user = "root";
    $password = "";
    $database = "academico";
    $hostname = "localhost";
    $connection = mysqli_connect($hostname, $user, $password,$database) or die ("Falha na conexão."); 
?>