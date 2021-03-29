<!--
  Relação de atrasos - MENU DE RELATORIOS
  Grupo F - desenvolvido por Tassyla Lissa
-->

<table>
<thead><tr><th>Data de devolução</th><th>Dias atrasados</th><th>Multa</th></tr></thead>
<tbody>
<?php

$link = mysqli_connect("localhost", "root", "", "biblioteca") or die("Falha ao conectar: " . mysqli_connect_error());

//Insere alguns empréstimos para fins de teste enquanto o banco de dados não está povoado
mysqli_query($link, "DELETE FROM `emprestimos`");
mysqli_query($link, "INSERT INTO `emprestimos` (`id_alunos`, `id_acervo`, `data_emprestimo`, `data_prev_devol`, `data_devolucao`, `multa`) VALUES
    ('000.000.000-00', 3001, '2021-03-06', '2021-03-12', NULL, NULL),
    ('111.111.111-11', 3003, '2020-09-15', '2020-09-22', '2021-03-05', 245.69),
    ('222.222.222-22', 3005, '2021-01-18', '2021-01-25', '2021-03-01', 102.25)");

//Garantir aqui ou na própria interface (mais chique) se a data de inicio é maior que a data final
//Criar input tipo date para enviar data_inicio e data_fim
$dataInicio = null;
$dataFim = null;
if (isset($_GET["data_inicio"]) && isset($_GET["data_fim"])) {
    $dataInicio = new \DateTime($_GET["data_inicio"]);
    $dataFim = new \DateTime($_GET["data_fim"]);
}

$result = mysqli_query($link, "SELECT `Data_prev_devol`, `Data_devolucao`, `Multa` FROM `emprestimos`");

while ($registro = mysqli_fetch_array($result)) {
    if ($registro['Data_devolucao'] != NULL && $registro['Multa'] != NULL && $registro['Multa']!=0) {
        $dataDevolucao = new \DateTime($registro['Data_devolucao']);
        if($dataInicio != null && $dataFim!=null){
            $podeImprimir = false;
            if ($dataDevolucao >= $dataInicio && $dataDevolucao <= $dataFim)
                $podeImprimir = true;
        }else
            $podeImprimir = true;
        if ($podeImprimir) {
            $dataPrevDevol = new \DateTime($registro['Data_prev_devol']);
            $diasAtraso = ($dataPrevDevol->diff($dataDevolucao))->days;
            $multa = $registro['Multa'];
            echo "<tr><td>" . date_format($dataDevolucao, "d-m-Y") . "</td><td>$diasAtraso</td><td>$multa</td></tr>";
        }
    }
}
//Exemplo de teste:relacao_multas.php?data_inicio=2021-03-02&data_fim=2021-03-07
?>
</tbody>
</table>
