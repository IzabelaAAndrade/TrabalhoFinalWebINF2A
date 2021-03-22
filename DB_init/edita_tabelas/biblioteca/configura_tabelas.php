<?php

 //dados relativos ao banco de dados
 $servidor = "localhost";
 $usuario = "root";
 $senha = "";
 $nome_db = "biblioteca";
 $povoa_tabelas = "povoa_tabelas.sql";

 $conexao = mysqli_connect($servidor, $usuario, $senha, $nome_db) or die("Houve um problema na conexão :(");

 //Transformar o arquivo SQL em uma string a ser executada
 $queries_povoar_tabelas = file_get_contents($povoa_tabelas);
 //Executar as múltiplas queries que estão na string convertida do arquivo SQL
 if(mysqli_multi_query($conexao, $queries_povoar_tabelas)){
     echo("Edições Efetuadas com Sucesso =)");
 }else{
     echo("Erro na alteração das tabelas =(<br>ERRO: ");
 }

?>