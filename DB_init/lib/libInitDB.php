<?php

// inicializa o db com as tabelas descritas nos arquivos listados
// conn -> conexão mysql
// sql_list -> lista dos arquivos sql
// db_name -> nome do bd a ser inicializado
// override -> sobrescreve o db selecionado
function initDB($conn, $sql_list, $db_name = null, $override = false) {

	// deleta o db antigo (se override for true)
	if($override && isset($db_name) && !$conn->query("DROP DATABASE IF EXISTS `$db_name`"))
		echo "Erro ao remover o db $db_name: $conn->error<br>";
	
	// cria um novo db (opcional)
	if(isset($db_name) && !$conn->query("CREATE DATABASE IF NOT EXISTS `$db_name`"))
		echo "Erro ao criar o db $db_name: $conn->error<br>";

	if(isset($db_name) && !$conn->query("USE `$db_name`"))
		echo "Erro ao acessar o db $db_name: $conn->error<br>";
	
	// para todos os arquivos listados
	foreach($sql_list as $path) {
		$sql = '';
		
		// procura e lê o arquivo
		if(file_exists($path)) {
			$sql = file_get_contents($path);
		}
		else if(file_exists("$path.sql")) {
			$path .= '.sql'; // adiciona a extensão .sql automaticamente
			$sql = file_get_contents($path);
		}
		else {
			echo "Pelo visto o arquivo $path não existe<br>";
			continue;
		}

		// manda o arquivo ser executado
		if($conn->query($sql))
			echo "Arquivo $path OK<br>";
		else
			echo "Erro no arquivo $path: $conn->error<br>";
	}
	
	// mensagem de conclusão
	if(isset($db_name))
		echo "Inicialização de $db_name concluída =)<br>";
	else
		echo "Inicialização concluída =)<br>";
}

?>