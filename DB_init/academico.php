<?php

include_once 'lib/libConnection.php';
include_once 'lib/libInitDB.php';

// lista com o caminho dos arquivos sql a serem interpretados
$sql_list = array(
  'sql/B/campi', 'sql/B/cursos', 'sql/B/turmas', 'sql/I/etapas'
);
initDB($conn, $sql_list, 'academico', true);

?>
