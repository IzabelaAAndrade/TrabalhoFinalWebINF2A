<?php

session_start();
unset($_SESSION['tableIsReady']);
unset($_SESSION['historico']);
$_SESSION['historico'] = '';

//cpf do aluno
$id = $_POST['cpf'];

//array que receberá os dados básicos do aluno - nome, cpf, média global e faltas
$student_data =  [
    'id_alunos' => $id
];

//array que recebrá as atividades
$atvs = [];

//array auxiliar que receberá as disciplinas cadastradas no bd
$subjects = [];

//var auxiliar para somar o total de faltas do aluno
$faltas = 0;


$conn = mysqli_connect('localhost', 'root', '', 'academico');
$sql = "SELECT alunos.nome, matriculas.id, matriculas.id_disciplinas
        FROM alunos, matriculas
        WHERE alunos.id = '$id' AND matriculas.id_alunos = '$id'";

//Pega os dados básicos do aluno - nome, cpf, id_disciplinas
if($result = mysqli_query($conn, $sql)) {
    $aux = mysqli_fetch_array($result);
    $aux['id_matriculas'] = $aux['id'];
    unset($aux['id']);
    $student_data = array_merge($student_data, $aux);
    unset($aux);
}

//Pega as atividades do aluno
$sql = 'SELECT atividades.nome, atividades.valor, atividades.id_disciplinas FROM diario, atividades
        WHERE diario.id_matriculas = ' . $student_data['id_matriculas'] . ' AND diario.id_atividades = atividades.id';
if($result = mysqli_query($conn, $sql)) {
    //se não forem encontradas atividades, será feita apenas uma tabela com nome e cpf
    if(mysqli_num_rows($result) == 0) {
        $table_data = [0 => [
            'Nome' => $student_data['nome'],
            'CPF' => $student_data['id_alunos'],
            ]
        ];
        build_table($table_data);
        unset($table_data);
        $_SESSION['tableIsReady'] = true;
        $_SESSION['no-activities'] = true;
        die();
    }
    $i = 0;
    while($row = mysqli_fetch_row($result)) {
        $atvs[$i] = ['nome' => $row[0], 'valor' => $row[1], 'id_disc' => $row[2]];
        $i++;
    }
}

//Informacoes do diario - notas e faltas
$sql = 'SELECT nota, faltas FROM diario WHERE id_matriculas = ' . $student_data['id_matriculas'];
if($result = mysqli_query($conn, $sql)) {
    $aux = [];
    $i = 0;
    while($row = mysqli_fetch_row($result)) {
        $faltas += $row[1];
        $aux[$i] = ['nota' => $row[0]];
        $atvs[$i] = array_merge($atvs[$i], $aux[$i]);
        $i++;
    }
}

//Pega todas as disciplinas
$sql = 'SELECT id, nome FROM disciplinas';
if($result = mysqli_query($conn, $sql)) {
    while($row = mysqli_fetch_row($result)) {
        $subjects[$row[0]] = $row[1];
    }
}

//Relaciona as atividades do aluno com as disciplinas
foreach($atvs as $index => $atv) {
    if($atvs[$index]['disciplina'] = match_subject($atv['id_disc'], $subjects)) {
        unset($atvs[$index]['id_disc']);
    }
}

//Calcula o total de faltas e a média global do aluno
$student_data['faltas'] = $faltas;
$media = 0;
foreach($atvs as $row) {
    $media += $row['nota'];
}
$student_data['media'] = round(($media / (count($atvs))), 1);

//Construção das tabelas

//tabela com os dados do aluno - nome, cpf, média global e faltas
$table_data = [0 => [
        'Nome' => $student_data['nome'],
        'CPF' => $student_data['id_alunos'],
        'Média global' => $student_data['media'],
        'Faltas' => $student_data['faltas']
    ]
];

build_table($table_data);
unset($table_data);

//tabela que lista as atividades do aluno, assim como seus valores, notas e disciplinas
$table_data = [];
$i = 0;
foreach($atvs as $index => $row) {
    $table_data[$i] = [
        'Disciplina' => $row['disciplina'],
        'Atividade' => $row['nome'],
        'Valor' => $row['valor'],
        'Nota' => $row['nota']
    ];
    $i++;
}
build_table($table_data);
$_SESSION['tableIsReady'] = true;

//Functions

//Cria uma tabela a partir de um array na estrutura de $table_data, que pode ser vista acima
function build_table($table_data) {
    $tabela = '<table>
        <thead>
        <tr>';
    foreach($table_data[0] as $col => $row) {
        $tabela = $tabela .  "<th>" . ucfirst($col) . "</th>";
    }
    $tabela = $tabela .  '</tr>
        </thead>
        <tbody>';

    foreach($table_data as $row) {
        $tabela = $tabela .  '<tr>';
        foreach($row as $cell) {
            $tabela = $tabela .  '<td>' . $cell . '</td>';
        }
        $tabela = $tabela .  '</tr>';
    }
    $tabela = $tabela .  '</tbody>
        </table>';

    $_SESSION['historico'] .= $tabela;
}

//Pega o nome de uma disciplina pelo id
function match_subject($id, $subjects) {
    foreach($subjects as $id_disc => $name) {
        if($id == $id_disc) return $name;
    }
    return false;
}

mysqli_close($conn);

?>
