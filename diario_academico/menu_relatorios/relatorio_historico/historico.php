<?php
    @session_start();
    include '../../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css_relatorios/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="css/style_historico.css">
        <link rel="stylesheet" href="css/style_tabela_historico.css">
        <link rel="stylesheet" href="../css_relatorios/style_cabecalhos.css">
        <link rel="stylesheet" href="../css_relatorios/style_inputs_botoes.css">
    	<title>Menu de Relatórios - Histórico por Aluno e Turma | SIDA</title>
	</head>
<body>
    <header>
        <img src="../sidaLogo.jpg" alt="logo" id="logo">
        <h1 id="titulo">Sistema Diário Acadêmico</h1>
        <div id="dados_user">
        <div id="aux">
            <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
            <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
        </div>
        </div>
    </header>
    <nav>
            <ul class="menu">
                <li><a href="../../../sistema_login/index.php">Início</a></li>
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../../sobre.html">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../../campi/campi.php">Campi</a></li>
                        <li><a href="../../manutencao_departamentos/">Departamentos</a></li>
                        <li><a href="../../manutencao_cursos/index.php">Cursos</a></li>
                        <li><a href="../../manutencao_turmas/index.php">Turmas</a></li>
                        <li><a href="../../manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../../manutencao_professores/index.php">Professores</a></li>
                        <li><a href="../../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
                        <li><a href="../../manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../../manutencao_diarios/index.php">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../index.php">Relatórios</a>
                    <ul class="sub_menu">
                        <li><a href="../relatorio_certificado/index.php">Certificados</a></li>
                        <li><a href="index.php">Histórico por Aluno e Turma</a></li>
                        <li><a href="../relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                        <li><a href="../relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                        <li><a href="../relatorio_professores/index.php">Relação de Professores</a></li> 
                    </ul>
                </li>
                <li><a href="../../transferencia_alunos/index.php">Transferências</a></li>
            </ul>
    </nav>
    <main>
        <div id="cabecalho">
            <p><a href="../">Menu de Relatórios</a> > <a href="index.php">Histórico por Aluno e Turma</a></p>
            <h1 class="principal">Histórico por Aluno e Turma</h1>
		</div>

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
    die('<p class="nenhumResultado">Erro ao consultar BD: '.mysqli_error($conexao).'</p>');

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
	echo '<div class="divTabela"><h2>Histórico por Aluno e Truma</h2><table><caption>'. $turma->nome . '</caption>';
	// <th colspan="' . (count($turma->disciplinas)*3+1) . '">' . $turma->nome . '</th>
    echo '<thead><tr><th rowspan="2">Alunos</th>';
	
    // cria os títulos das disciplinas
	foreach($turma->disciplinas as $did => $dnome)
		echo "<th colspan=\"3\">$dnome</th>";
	echo '</tr><tr>';

    // cria as colunas de nota, valor e faltas
    foreach($turma->disciplinas as $did => $dnome)
		echo '<th>Nota</th><th>Valor</th><th>Faltas</th>';
	echo '</tr></thead><tbody>';

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
	echo '</tbody></table><div id="imprimir" class="imprimir">Imprimir</div></div>';
}

// se não tiverem registros
if(empty($turmas))
    echo('<p class="nenhumResultado">Nenhum registro encontrado!</p>');

?>
    </main>
    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
    <script src="../impressao_relatorios.js"></script>
</body>
</html>