<?php

include_once 'lib/libConnection.php';
include_once 'lib/libInitDB.php';

// lista com o caminho dos arquivos sql a serem interpretados
$sql_list = array(
  'sql/B/campi', 'sql/B/cursos', 'sql/B/turmas', 'sql/E/atividades', 'sql/E/conteudos', 'sql/E/etapas', 
  'sql/C/depto.sql', 'sql/C/professores.sql', 'sql/D/disciplinas.sql', 'sql/D/matriculas.sql',
  'sql/D/prof_disciplinas.sql','sql/F/diario.sql', 'sql/C/alunos.sql'
);
initDB($conn, $sql_list, 'academico', true);

?>
