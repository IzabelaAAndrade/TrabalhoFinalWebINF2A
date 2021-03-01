<?php

include_once 'lib/libConnection.php';
include_once 'lib/libInitDB.php';

// lista com o caminho dos arquivos sql a serem interpretados
$sql_list = array(
  'sql/B/campi', 'sql/B/cursos', 'sql/B/turmas', 'sql/E/atividades', 'sql/E/conteudos', 'sql/E/etapas'
);
initDB($conn, $sql_list, 'academico', true);

?>
