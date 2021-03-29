<!--
  Relação de atrasos - MENU DE RELATORIOS
  Grupo F - desenvolvido por Lucas Gabriel
-->

<?php
$conexao  = mysqli_connect("localhost", "root", "", "biblioteca") or die("Falha ao conectar: " . mysqli_connect_error());

    mysqli_query($conexao, "DELETE FROM `emprestimos`");

    //Testes enquanto nao ta totalmente funcional
    mysqli_query($conexao, "INSERT INTO `emprestimos` (`id_alunos`, `id_acervo`, `Data_emprestimo`, `Data_prev_devol`, `Data_devolucao`) VALUES
    ('89', 3001, '2004-05-11', '2019-07-11', '2020-08-11'),
    ('57', 3003, '2003-11-26', '2021-08-12', '2021-08-30')");

    $Devolucao = mysqli_query($conexao, "SELECT `id_alunos`, `id_acervo`, `data_emprestimo`, `data_prev_devol`, `data_devolucao` FROM `emprestimos`");

    echo "<table>
              <thead>
              <th>Id_alunos </th>
              <th>Id_acervo </th>
              <th>Data_emprestimo </th>
              <th>Data_prev_devol </th>
              <th>Data_devolucao </th>
              <th>Atrasos</th>
            </thead>";

    while ($atraso = mysqli_fetch_array($Devolucao)) {

    // diferença entre as datas

            $dataPrevDevol = new \DateTime($atraso['Data_prev_devol']);
            $dataDevolucao = new \DateTime($atraso['Data_devolucao']);
            $diasAtraso = ($dataPrevDevol->diff($dataDevolucao))->days;

     echo    "<tr>
                <td>" . $atraso['id_alunos'] . "</td>
                <td>" . $atraso['id_acervo'] . "</td>
                <td>" . $atraso['data_emprestimo'] . "</td>
                <td>" . $atraso['data_prev_devol'] . "</td>
                <td>" . $atraso['data_devolucao'] . "</td>";

     if($diasAtraso > 0){
               echo "<td>" . $diasAtraso . " dias</td> </tr>";
     }
     else{
         echo "<td> Sem atraso </td> </tr>";
     }

     // Estilo pra tabela ficar um pouco menos confusa
     echo "<style>
        table, td, th{
         border: solid 1px;
         border-collapse: collapse

        </style>";
        }

?>
