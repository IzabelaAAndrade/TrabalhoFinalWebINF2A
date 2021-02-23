<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// */

define('SERVER', 'localhost');
define('USER', 'userlegal');
define('PWORD', 'senhalegal');

// Cria conexão
$conn = new \mysqli(SERVER, USER, PWORD);
// Verifica
if ($conn->connect_error) {
  die("falha na conexão: " . $conn->connect_error);
}

function send($conn, $query, $verbose = false) {
    $result = $conn->query($query);
    if($verbose) {
        echo 'Query: '.$query.'<br>';
        if($result)
            echo 'OK<br>';
        else 
            echo "ERRO: ".$conn->error;
    }
    return $result;
}

function close($conn) {
    $conn->close();
}

?>