<?php
    function insere_na_tabela(){
        $data_antiga = strtotime($data); // Data digitada em segundos
        $nova_data = $data_antiga+604800; // Data em segundos + 7 dias em segundos
        $tempo_espera_segundos = $nova_data - $data_antiga; // Tempo de espera em segundos
        $tempo_espera_dias = $tempo_espera_segundos/86400; // Conversão -> tempo de espera em dias
        $inserir_reserva = "INSERT INTO `reservas` (`id_alunos`, `id_acervo`, `data_reserva`, `tempo_espera`, `emprestou`) VALUES
        ('".$alunos[0]."', '".$itens[0]."', '".$data."', '".$tempo_espera_dias."' , 'N')";
        mysqli_query($conexao, $inserir_reserva);
     }

?>