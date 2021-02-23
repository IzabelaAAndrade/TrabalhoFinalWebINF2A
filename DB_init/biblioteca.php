<?php

include_once 'lib/libConnection.php';
include_once 'lib/libInitDB.php';

// lista com o caminho dos arquivos sql a serem interpretados
$sql_list = array('sql/G/periodicos', 'sql/G/academicos', 'sql/G/midias');
initDB($conn, $sql_list, 'biblioteca', true);

?>