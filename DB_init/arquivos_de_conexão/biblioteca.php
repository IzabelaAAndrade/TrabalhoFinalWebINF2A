<?php

include_once '../lib/libConnection.php';
include_once '../lib/libInitDB.php';
global $conn;
// lista com o caminho dos arquivos sql a serem interpretados
$sql_list = array(
  '../sql/A/alunos.sql','../sql/G/periodicos.sql', '../sql/G/academicos.sql', '../sql/G/midias.sql', '../sql/I/descartes.sql', '../sql/I/reservas.sql', '../sql/F/acervo.sql',
  '../sql/F/livros.sql', '../sql/H/autores.sql', '../sql/H/emprestimos.sql','../sql/H/partes.sql',
);

initDB($conn, $sql_list, 'biblioteca', true);

?>
