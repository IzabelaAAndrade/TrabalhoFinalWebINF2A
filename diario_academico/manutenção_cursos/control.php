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
                        <th width='15%'>Departamento</th>
                        <th width='30%'>Nome</th>
                        <th>Total de Horas</th>
                        <th>Modalidade</th>
                        <th><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='close'></button></th>
                    </tr>
                </thead>
                <tbody>";
                while ($row = mysqli_fetch_array($resultado)){

                    if($op=="exclusão"){
                        echo "<tr>
                                <td>".$row['id']."</td>         
                                <td>".$row['id_depto']."</td>           
                                <td>".$row['nome']."</td>           
                                <td>".$row['horas_total']."</td>            
                                <td>".$row['modalidade']."</td> 
                                <td class='actions text-right'> <a class='' data-toggle='modal' data-target='#delete-modal' data-customer='' onclick='remove_row(".$row['id'].")'><img src='img/excluir.svg' width='20px' height='20px' title='Excluir'></a></td>
                            </tr>";
                    } else {
                        echo "<tr class='tr-edicao'>
                                <td>".$row['id']."</td>         
                                <td>";
                        echo "<select id='id_departamento'>";
                        $query = "SELECT * FROM depto";
                        $resultado_departamentos = mysqli_query($conexao,$query) or die();
                        while($row_departamentos = mysqli_fetch_array($resultado_departamentos)){
                            $id_departamento = $row_departamentos["id"];
                            $nome_departamento = $row_departamentos["nome"];
                            if($id_departamento==$row["id_depto"]){
                                echo "<option value='$id_departamento' selected>$nome_departamento</option>";
                            } else {
                                echo "<option value='$id_departamento'>$nome_departamento</option>";
                            }
                            
                        }
                        echo "</select></td>           
                                <td><input type='text' class='inputs-edicao' placeholder='Nome' value='".$row['nome']."'></td>           
                                <td><input type='text' class='inputs-edicao' placeholder='Total de horas' value='".$row['horas_total']."'></td>            
                                <td><input type='text' class='inputs-edicao' placeholder='Modalidade' value='".$row['modalidade']."'></td> 
                                <td class='actions text-right'><a class='btn btn-sm btn-warning editar'> Salvar</a></td>
                            </tr>";
                    }
                }
        echo "</tbody>
            </table>";

    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhum curso cadastrado!</div>";
    }
?>