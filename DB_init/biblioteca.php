<?php

include_once 'lib/libConnection.php';
include_once 'lib/libInitDB.php';

// lista com o caminho dos arquivos sql a serem interpretados
$sql_list = array(
  'sql/A/alunos.sql','sql/G/periodicos', 'sql/G/academicos', 'sql/G/midias', 'sql/I/descartes', 'sql/I/reservas', 'sql/F/acervo.sql', 
  'sql/F/livros.sql', 'sql/H/autores.sql', 'sql/H/emprestimos.sql','sql/H/partes.sql' 
);

initDB($conn, $sql_list, 'biblioteca', true);

?>
