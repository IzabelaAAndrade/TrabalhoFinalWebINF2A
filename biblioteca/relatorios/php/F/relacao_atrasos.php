<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//*/
Error_reporting(0);

include_once('../lib/libConnection.php');

//Testes enquanto nao ta totalmente funcional
/*
// mysqli_query($conn, 'DELETE FROM `emprestimos`');
mysqli_query($conn, 'INSERT INTO `emprestimos` (`Id_alunos`, `Id_acervo`, `Data_emprestimo`, `Data_prev_devol`, `Data_devolucao`) VALUES
					('89', 3001, '2004-05-11', '2019-07-11', '2020-08-11'),
					('57', 3003, '2003-11-26', '2021-08-12', '2021-07-11')');
//*/

$atrasos = mysqli_query($conn, 'SELECT * FROM emprestimos');

// Estilo pra tabela ficar um pouco menos confusa
/*
echo 
'<style>
	table, td, th{
	border: solid 1px;   
	border-collapse: collapse
</style>';
// */
if(!$atrasos) {
	echo 'Erro ao recuperar os registros: ' . mysqli_error($conn);
}
else if(mysqli_num_rows($atrasos) == 0) {
	echo 'Nenhum registro encontrado!';
}
else {
	echo 
	"<table>
		<thead>
			<th>id do aluno </th>
			<th>id do acervo </th>
			<th>data de emprestimo </th>
			<th>prazo</th>
			<th>data da devolucao </th>
			<th>atraso</th>
		</thead>";
		
	while ($atraso = mysqli_fetch_assoc($atrasos)) {
		if ($atraso['Data_devolucao'] != NULL) {

			$dataPrevDevol = new \DateTime($atraso['Data_prev_devol']);
			$dataDevolucao = new \DateTime($atraso['Data_devolucao']);
			$diasAtraso = ($dataPrevDevol->diff($dataDevolucao))->days;

			echo    "<tr>
			<td>" . $atraso['Id_alunos'] . "</td>
			<td>" . $atraso['Id_acervo'] . "</td>
			<td>" . $atraso['Data_emprestimo'] . "</td>
			<td>" . $atraso['Data_prev_devol'] . "</td>
			<td>" . $atraso['Data_devolucao'] . "</td>";
							
			if($diasAtraso > 0)
				echo "<td>" . $diasAtraso . " dias</td> </tr>";
			else
				echo "<td> Sem atraso </td> </tr>";
		}
	}
}
?>

<!-- 

Alterações:
identação,
tirar o estilo de dentro do while
variavel $dataDevolucao sendo trocada no while

 -->
