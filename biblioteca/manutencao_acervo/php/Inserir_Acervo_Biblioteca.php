<?php

//      CONEXÃO COM O BANCO DE DADOS

$cnx = mysqli_connect(
    'localhost',
    'root',
    '',
    'biblioteca'
) or die("Falha na conexão com o banco de dados");

//      ESPECIFICANDO (LIVROS, PERIÓDICO, ACADÊMICOS OU MÍDIAS)

$tipo = $_POST['tipo'];

//      ACERVO

if(mysqli_query($cnx, "SELECT MAX(`id`) FROM `acervo`")){
    $result_set = mysqli_query($cnx, "SELECT MAX(`id`) FROM `acervo`");
    $qdd = mysqli_fetch_row($result_set)[0];
}   else{
        $qdd = 0;
    }

$id_acervo = 1 + $qdd;      // usado no insert dos livros
$campus = $_POST['campus'];
$nome = $_POST['nome'];
$local = $_POST['local'];
$ano = $_POST['ano'];
$editora = $_POST['editora'];
$paginas = $_POST['paginas'];

mysqli_query($cnx, "INSERT INTO `acervo`(`id_campi`, `nome`, `local`, `tipo`, `ano`, `editora`, `paginas`) VALUES($campus, '$nome', '$local', '$tipo', $ano, '$editora', $paginas)");

//      AUTORES

$autor_nome = $_POST['autor'];
$sobrenome = $_POST['sobrenome'];
$ordem = $_POST['ordem'];
$qualificacao = $_POST['qualificacao'];

    for ($cont = 0; $cont < count($autor_nome); $cont++) {
        mysqli_query($cnx, "INSERT INTO `autores`(`nomes`, `sobrenomes`, `ordem`, `qualificacao`) VALUES('$autor_nome[$cont]', '$sobrenome[$cont]', '$ordem[$cont]', '$qualificacao[$cont]')");
    } 

//      PARTES

$titulo = $_POST['titulo'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$chave = $_POST['chave'];

    for ($cont2 = 0; $cont2 < count($titulo); $cont2++) {  
        mysqli_query($cnx, "INSERT INTO `partes`(`titulo`, `pag_inicio`, `pag_final`, `palavras_chave`) VALUES('$titulo[$cont2]', $inicio[$cont2], $fim[$cont2], '$chave[$cont2]')");
    }  


//      DEFININDO MAIOR ID'S DE OBRAS

if(mysqli_query($cnx, "SELECT MAX(`id_obra`) FROM `livros`")){
    $result_livro = mysqli_query($cnx, "SELECT MAX(`id_obra`) FROM `livros`");
    $maior_id_obra_livros = mysqli_fetch_row($result_livro)[0];
}   else{
        $maior_id_obra_livros = 0;
    }

if(mysqli_query($cnx, "SELECT MAX(`id`) FROM `periodicos`")){
    $result_periodicos = mysqli_query($cnx, "SELECT MAX(`id`) FROM `periodicos`");
    $maior_id_obra_periodicos = mysqli_fetch_row($result_periodicos)[0];
}   else{
        $maior_id_obra_periodicos = 0;
    }

if(mysqli_query($cnx, "SELECT MAX(`id_obra`) FROM `academicos`")){
    $result_academicos = mysqli_query($cnx, "SELECT MAX(`id_obra`) FROM `academicos`");
    $maior_id_obra_academicos = mysqli_fetch_row($result_academicos)[0];
}   else{
        $maior_id_obra_academicos = 0;  
    }


if(mysqli_query($cnx, "SELECT MAX(`id_obra`) FROM `midias`")){
    $result_midias = mysqli_query($cnx, "SELECT MAX(`id_obra`) FROM `midias`");
    $maior_id_obra_midias = mysqli_fetch_row($result_midias)[0];
}   else{
        $maior_id_obra_midias = 0;
    }

$maior = max([
    $maior_id_obra_livros,
    $maior_id_obra_academicos,
    $maior_id_obra_midias,
    $maior_id_obra_periodicos
]);

$id_obra = $maior + 1;

//      LIVROS

if (strcmp($tipo, 'livros')==0){
    $edicao = $_POST['edicao'];
    $isbn = $_POST['isbn'];

    mysqli_query($cnx, "INSERT INTO `livros`(`id_obra`,`id_acervo`, `edicao`, `isbn`) VALUES($id_obra, $id_acervo, '$edicao', '$isbn')");
}   

//      PERIÓDICOS

else if (strcmp($tipo, 'periodicos')==0) {
    $periodicidade = $_POST['periodicidade'];
    $mes = $_POST['mes'];
    $volume = $_POST['volume'];
    $subtipoP = $_POST['subtipoP'];
    $issn = $_POST['issn'];

    mysqli_query($cnx, "INSERT INTO `periodicos`(`id`,`periodicidade`, `mes`, `volume`, `subtipo`, `issn`) VALUES($id_obra,'$periodicidade', '$mes', $volume, '$subtipoP', '$issn')");
}   

//      ACADÊMICOS

else if (strcmp($tipo,'academicos')==0) {
    $programa = $_POST['programa'];

    mysqli_query($cnx, "INSERT INTO `academicos`(`id_obra`, `programa`) VALUES($id_obra, '$programa')");
}   

//      MÍDIAS

else if (strcmp($tipo,'midias')==0) {
    $tempo = $_POST['tempo'];
    $subtipoM = $_POST['subtipoM'];

    mysqli_query($cnx, "INSERT INTO `midias`(`id_obra`, `tempo`, `subtipo`) VALUES($id_obra, $tempo, '$subtipoM')");
}

?>