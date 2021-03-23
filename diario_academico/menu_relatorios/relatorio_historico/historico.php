<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

td, th {
	padding: 10px;
}

table {
  border-collapse: collapse;
}
</style>
</head>
<body>

<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

error_reporting(0);

Header("Content-type: text/html; charset=utf-8");

// classes +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

class Diario {
    public $nota;
    public $faltas;
    public $total;

    public function __construct($nota, $total, $faltas) {
        $this->nota = $nota;
        $this->faltas = $faltas;
        $this->total = $total; 
    }
}

class Aluno {
    public $nome;
    public $diarios = Array();

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function registro($id_disciplina, $diario) {
        $this->diarios[$id_disciplina] = $diario;
        // echo 'por nota ' . $this->diarios[$id_disciplina]->nota . ' id ' . $id_disciplina;
    }
}

class Turma {
    public $nome;
    public $alunos = Array();
    public $disciplinas = Array();

    public function __construct($nome) {
        $this->nome = $nome;
        // echo 'nova turma<br>';
    }

    public function registro($id_disciplina, $nome_disciplina, $id_aluno, $nome_aluno, $diario) {
        if(!array_key_exists($id_disciplina, $this->disciplinas))
            $this->disciplinas[$id_disciplina] = $nome_disciplina;
        if(!array_key_exists($id_aluno, $this->alunos))
            $this->alunos[$id_aluno] = new Aluno($nome_aluno);
        $this->alunos[$id_aluno]->registro($id_disciplina, $diario);
        // echo 'id '.$id_aluno.' count '.count($this->alunos).' exists '.array_key_exists($id_aluno, $this->alunos).'<br>';
    }
}

// filtros +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$f_nome = $_GET['nome'];
$f_turma = $_GET['turma'];
$f_disciplina = $_GET['disciplina'];
// $f_notamin = $_GET['notamin'];
// $f_notamax = $_GET['notamax'];

$filtros = array();

if(isset($f_nome) && $f_nome != '')
    array_push($filtros, "a.nome LIKE '%$f_nome%'");

if(isset($f_turma) && $f_turma != '')
    array_push($filtros, "t.nome LIKE '%$f_turma%'");

if(isset($f_disciplina) && $f_disciplina != '')
    array_push($filtros, "d.nome LIKE '%$f_disciplina%'");

$filtro = '';
if(count($filtros) != 0)
    $filtro = 'WHERE ' . implode(' AND ', $filtros);

// echo "filtro: $filtro<br>";

// conexão +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

include 'conexao.php';

// query +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$sql = "SELECT 
t.nome as nome_turma, 
t.id as id_turma,
d.nome as nome_disciplina, 
d.id as id_disciplina,
a.nome as nome_aluno, 
a.id as id_aluno, 
sum(di.nota) as nota,
sum(atv.valor) as total,
sum(di.faltas) as faltas
FROM turmas t
INNER JOIN disciplinas d ON t.id = d.id_turmas
INNER JOIN matriculas m ON d.id = m.id_disciplinas
INNER JOIN alunos a ON m.id_alunos = a.id
INNER JOIN diario di ON m.id = di.id_matriculas 
INNER JOIN atividades atv ON di.id_atividades = atv.id 
$filtro GROUP BY a.id, d.id ";

// echo $sql;

$data = mysqli_query($conexao, $sql);

if (!$data)
    die('Erro ao consultar BD: '.mysqli_error($conexao));

// criação das turmas +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$turmas = Array();

while($registro = mysqli_fetch_assoc($data)) {
    $turma = $registro['nome_turma'];
    $id_turma = $registro['id_turma'];
    $disciplina = $registro['nome_disciplina'];
    $id_disciplina = $registro['id_disciplina'];
    $aluno = $registro['nome_aluno'];
    $id_aluno = $registro['id_aluno'];
    $nota = $registro['nota'];
    $total = $registro['total'];
    $faltas = $registro['faltas'];

    // echo("turma $turma disciplina $disciplina aluno $aluno nota $nota");

    if(!array_key_exists($id_turma, $turmas))
        $turmas[$id_turma] = new Turma($turma);
    
    $diario = new Diario($nota,$total,$faltas);
    $turmas[$id_turma]->registro($id_disciplina, $disciplina, $id_aluno, $aluno, $diario);
    // echo " $aluno ";
}

// criação das tabelas +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

foreach($turmas as $turma) {
	
	// cria a linha de títulos ( | alunos | Mat | Fil | etc.. )
	echo '<table><tr><th colspan="' . (count($turma->disciplinas)*3+1) . '">' . $turma->nome . '</th></tr>';
	echo '<tr><th rowspan="2">alunos</th>';
	
    // cria os títulos das disciplinas
	foreach($turma->disciplinas as $did => $dnome)
		echo "<th colspan=\"3\">$dnome</th>";
	echo '</tr><tr>';

    // cria as colunas de nota, valor e faltas
    foreach($turma->disciplinas as $did => $dnome)
		echo '<th>nota</th><th>valor</th><th>faltas</th>';
	echo '</tr>';

	// para cada aluno da turma
	foreach($turma->alunos as $aid => $aluno) {
		echo "<tr><td>$aluno->nome</td>"; // coloca o nome na primeira coluna
		// para cada disciplina da turma
		foreach($turma->disciplinas as $did => $dnome) {
            if(!array_key_exists($did, $aluno->diarios)) {
                echo '<td>-</td><td>-</td><td>-</td>';
                continue;
            }
			echo '<td>'.$aluno->diarios[$did]->nota.'</td>';
            echo '<td>'.$aluno->diarios[$did]->total.'</td>';
            echo '<td>'.$aluno->diarios[$did]->faltas.'</td>';
        }
		echo '</tr>';
	}
	echo '</table>';
}

// se não tiverem registros
if(empty($turmas))
    echo('Nenhum registro encontrado!');

?>

</body>
</html>