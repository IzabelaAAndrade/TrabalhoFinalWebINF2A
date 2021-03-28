<?php
session_start();
$id = $_GET['selecionado'];
$_SESSION['reserva_a_ser_deletado'] = $id;
$conexao = mysqli_connect("localhost", "root", "", "biblioteca") or die("Erro de conexão!");
$query1 = "SELECT * FROM reservas where id = '" . $id . "'";
$result1 = mysqli_query($conexao, $query1);
$query2 = "SELECT * FROM acervo";
$result2 = mysqli_query($conexao, $query2);
$query3 = "SELECT * FROM alunos";
$result3 = mysqli_query($conexao, $query3);

echo "<form action='deletar_reservas_logica.php' method='get'>";
echo "<label for='selecao_reservas'>Item da reserva a ser deletado:</label>";
echo "<select id='selecao_reservas' name='id_itens' class='caixa-seleção'>";
while ($linha = mysqli_fetch_assoc($result1)) {
    while ($linha_iten = mysqli_fetch_assoc($result2)) {
        if ($linha['id_acervo'] == $linha_iten['id']) {
            echo "<option value=''>" . $linha['id_acervo'] . " - " . $linha_iten['nome'] . "</option>";
            break;
        }
    }
    echo "</select>";
    echo "<label for='selecao_alunos_reservas'> Nome do Aluno: </label>";
    echo "<select id='selecao_alunos_reservas' name='id_alunos' class='caixa-seleção'>";
    while ($linha_nome = mysqli_fetch_assoc($result3)) {
        if ($linha['id_alunos'] == $linha_nome['id']) {
            echo "<option value=''>" . $linha['id_alunos'] . " - " . $linha_nome['nome'] . "</option>";
            break;
        }
    }
    echo "</select>";
    echo "<label for='dt_reserva'>Data de Reserva a ser Deletada: </label>";
    echo "<input class='input' type='date' name='estimativa_reserva' value='".$linha['data_reserva']."' disabled>";
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