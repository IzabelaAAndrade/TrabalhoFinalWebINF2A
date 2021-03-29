<?php
session_start();
$id = $_GET['selecionado'];
$_SESSION['reserva_a_ser_alterada'] = $id;
$conexao = mysqli_connect("localhost", "root", "", "biblioteca") or die("Erro de conexão!");
$query_pesquisa_reservas_id = "SELECT * FROM reservas where id = '" . $id . "'";
$result_pesquisa_reservas_id = mysqli_query($conexao, $query_pesquisa_reservas_id);
$query_pesquisa_reservas = "SELECT * FROM reservas";
$result_pesquisa_reservas = mysqli_query($conexao, $query_pesquisa_reservas);
$query_pesquisa_acervo = "SELECT * FROM acervo";
$result_pesquisa_acervo = mysqli_query($conexao, $query_pesquisa_acervo);
$query_pesquisa_alunos = "SELECT * FROM alunos";
$result_pesquisa_alunos = mysqli_query($conexao, $query_pesquisa_alunos);

echo "<form action='alterar_reservas_logica.php' method='get'>";
echo "<label for='selecao_reservas'>Item de Reserva (alterar):</label>";
echo "<select id='selecao_reservas' name='id_itens' class='caixa-seleção'>";
while ($linha = mysqli_fetch_assoc($result_pesquisa_reservas_id)) {
    while ($linha_iten = mysqli_fetch_assoc($result_pesquisa_acervo)) {
       if ($linha['id_acervo'] == $linha_iten['id']) {
        echo "<option value='".$linha_iten['id']."' selected>" . $linha_iten['id'] . " - " . $linha_iten['nome'] . "</option>";
        }else{
            echo "<option value='".$linha_iten['id']."'>" . $linha_iten['id'] . " - " . $linha_iten['nome'] . "</option>";
        }
    }
    echo "</select>";
    echo "<label for='selecao_alunos_reservas'> Nome do Aluno (não é possível alterar): </label>";
    echo "<select id='selecao_alunos_reservas' name='id_alunos' class='caixa-seleção'>";
    while ($linha_nome = mysqli_fetch_assoc($result_pesquisa_alunos)) {
        if ($linha['id_alunos'] == $linha_nome['id']) {
            echo "<option value=''>" . $linha['id_alunos'] . " - " . $linha_nome['nome'] . "</option>";
            break;
        }
    }
    echo "</select>";
    echo "<label for='dt_reserva'>Data de Reserva (alterar): </label>";
    echo "<input class='input' type='date' name='estimativa_reserva' value='".$linha['data_reserva']."' >";
    echo "<div class='botoes'>
                            <button type='submit' class='btn btn-default' id='btn_1' onclick='location.reload(true);'>
                                Confirmar
                            </button>
                            <button type='button' class='btn btn-default' id='btn_2' data-dismiss='modal' onclick='location.reload(true);'>
                                Cancelar
                            </button>

                        </div>";
    echo "</form>";
}
mysqli_close($conexao);
?>
