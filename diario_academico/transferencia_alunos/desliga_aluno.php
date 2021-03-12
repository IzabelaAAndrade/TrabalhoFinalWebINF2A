<!--
  Formulário para transferir alunos - TRANSFERENCIA DE ALUNOS
  Altera a situacao do aluno de ATIVO “S” para “N”
  Grupo F - desenvolvido por Tássyla Lima
-->

<?php

$link = mysqli_connect("localhost", "root", "", "academico") or die("Falha ao conectar: " . mysqli_connect_error());

//Para fins de teste enquanto o banco de dados não está povoado
//Insere algumas matrículas

mysqli_query($link, "DELETE FROM `matriculas`");

mysqli_query($link, "INSERT INTO `matriculas` (`id_alunos`, `id_disciplinas`, `ano`, `ativo`) VALUES
                 ('000.000.000-00', 3001, 2021, 'S'),
                 ('111.111.111-11', 3003, 2020, 'S'),
                 ('222.222.222-22', 3005, 2019, 'S')");

//Fim da inserção de matrículas

$id_aluno = $_POST["cpf"];

$result = mysqli_query($link, "SELECT `ativo` FROM `matriculas` WHERE `id_alunos` = '$id_aluno'");

$i = 0;
$esta_ativo = false;

while ($ativo = mysqli_fetch_array($result)) {
    $i++;
    if($ativo['ativo']=='S'){
        $esta_ativo = true;
    }
}

if($i==0){
    $mensagem = "CPF não encontrado";
}
else if($i!=1){
    $mensagem = "Erro de Consistência: múltiplos CPF's encontrados"; //mensagem alterada pelo sallum
}
else if($esta_ativo){
    if (mysqli_query($link, "UPDATE `matriculas` SET `ativo` = 'N' WHERE `id_alunos` = '$id_aluno'")) {
        $mensagem = "Situação de atividade atualizada";
    }
    else {
        $mensagem = "Erro ao atualizar situação";
    }
}
else {
    $mensagem = "O aluno já foi desligado";
}

echo $mensagem;

mysqli_close($link);

?>
