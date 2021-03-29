/*Arquivo para criar o banco de dados login*/

<?php

session_start();

$baseDados = "CREATE DATABASE IF NOT EXISTS cadastros";

if(mysqli_query($conexao, $baseDados)){ //Em caso de sucesso
    echo "Base de dados criada com sucesso";
} else { //Em caso de erro
    echo "Erro ao criar a base de dados: " . mysqli_error($conexao) . "<br>";
}

//Abre conexao com o banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ("MySQL: impossível conectar-se ao servidor". HOST); 

$tabela = "CREATE TABLE IF NOT EXISTS usuarios(   
    id_usuario int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    nome Varchar(100),
    email Varchar(100),
    senha Varchar(40),
    Primary Key (id_usuario)
    )ENGINE = MyISAM";

if(mysqli_query($conexao, $tabela)){ //Em caso de sucesso
    echo "Tabela criada com sucesso";
}else{ //Em caso de erro
    echo "Erro ao criar a base de dados: " . mysqli_error($conexao) . "<br>";
}

?>
