<?php

include_once('../lib/libConnection.php');

/*
mysqli_query($conn, "DELETE FROM `livros`");
mysqli_query($conn, "DELETE FROM `descartes`");

mysqli_query($conn, "INSERT INTO `livros` (`id_obra`, `id_acervo`, `edicao`, `isbn`) VALUES 
					(201, 3001, '2ª', '123'),
					(202, 3003, '3ª', '456'),
					(203, 3005, '1ª', '789')");

mysqli_query($conn, "INSERT INTO `descartes` (`id_acervo`, `data_descarte`, `motivos`, `operador`) VALUES
					(3001, '2021-01-01', 'Livro rasgado', 'Júlio'),
					(3005, '2021-01-25', 'Livro faltando páginas', 'Sara')");
// */

$sql = "SELECT * FROM `descartes`";
$query = mysqli_query($conn, $sql);

$sql = "SELECT `descartes`.*, `livros`.*, `livros`.`id_acervo` AS `id_livro` FROM `descartes`
				INNER JOIN `livros` ON `livros`.`id_acervo` = `descartes`.`id_acervo`";

$query = mysqli_query($conn, $sql);

$tabela = '<table>
				<thead>
					<th>id do acervo</th>
					<th>id da obra</th>
					<th>edicao</th>
					<th>isbn</th>
					<th>data_descarte</th>
					<th>motivos</th>
					<th>operador</th>
				</thead>';

while ($livro = mysqli_fetch_assoc($query)) {
	$tabela .= '<tr>
					<td>' . $livro['id_acervo'] . '</td>
					<td>' . $livro['id_obra'] . '</td>
					<td>' . $livro['edicao'] . '</td>
					<td>' . $livro['isbn'] . '</td>
					<td>' . $livro['data_descarte'] . '</td>
					<td>' . $livro['motivos'] . '</td>
					<td>' . $livro['operador'] . '</td>
				</tr>';
}

$tabela .= '</table>';
echo $tabela;
echo '<br><hr>';
?>
