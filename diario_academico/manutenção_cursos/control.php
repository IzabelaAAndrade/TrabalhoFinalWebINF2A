<?php
    require("conexao.php");
    $query = "SELECT * FROM cursos";
    $resultado = mysqli_query($conexao,$query) or die("<div class='alert alert-danger' role='alert'>Erro de conexão!</div>");
    $qtd_registros = mysqli_num_rows($resultado);
    $op = $_POST['opcao'];
    if($qtd_registros>0){
        echo "<table class='table table-hover' id='listagem'>   
                <thead>
                    <tr>
                        <th>ID</th>
                        <th width='30%'>ID do Departamento</th>
                        <th>Nome</th>
                        <th>Total de Horas</th>
                        <th>Modalidade</th>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='close'></button>
                    </tr>
                </thead>
                <tbody>";
                while ($row = mysqli_fetch_array($resultado)){
                    echo "<tr>
                        <td>".$row['id']."</td>         
                        <td>".$row['id_depto']."</td>           
                        <td>".$row['nome']."</td>           
                        <td>".$row['horas_total']."</td>            
                        <td>".$row['modalidade']."</td> 
                        <td class='actions text-right'>";
                    if($op=="exclusão"){
                        echo "<a class='btn btn-sm btn-danger excluir' data-toggle='modal' data-target='#delete-modal' data-customer='' onclick='remove_row(".$row['id'].")'><i class='fa fa-trash'></i> Excluir</a>";
                    } else {
                        echo "<a href='' class='btn btn-sm btn-warning editar' onclick='edit_row(".$row['id'].")'><i class='fa fa-pencil'></i> Editar</a>";
                    }            
                                           
                            
                    echo "</td>
                    </tr>";
                }
        echo "</tbody>
            </table>";

    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhum curso cadastrado!</div>";
    }
?>