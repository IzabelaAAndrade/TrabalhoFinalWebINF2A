<?php

$data = json_decode($_POST['data']);

// Checa se há algum input vazio
$checkData = get_object_vars($data);
foreach($checkData as $value) {
    if($value == '' || $value == null) {
        http_response_code(200);
        echo 'empty-input';
        die();
    }
}

// Conexão com o DB
$conn = mysqli_connect('localhost', 'root', '', 'biblioteca');

// Checa se o livro está emprestado
$sql = "SELECT id, data_prev_devol FROM emprestimos WHERE id_acervo = $data->id";

if($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $emprestimo_data = [
            'id' => $row['id'],
            'data_devolucao' => $row['data_prev_devol']
        ];
        http_response_code(201);
        echo json_encode($emprestimo_data);
        die();
    }
}

$sql = "SELECT tipo FROM acervo WHERE id = $data->id";
$tipo = mysqli_query($conn, $sql);
$tipo = mysqli_fetch_row($tipo);
$tipo = $tipo[0];

// Deleta o acervo da tabela acervo e da tabela do tipo correspondente
$sql = "DELETE acervo, $tipo FROM acervo INNER JOIN $tipo WHERE acervo.id = $data->id AND $tipo.id_acervo = $data->id";

if(mysqli_query($conn, $sql)) http_response_code(200);

// Adiciona os dados do acervo descartado na tabela descartes
$sql = "INSERT INTO descartes (id_acervo, data_descarte, motivos, operador) VALUES (
    $data->id,
    '" . date('Y-m-d') . "',
    '$data->motivos',
    '$data->operador'
)";

if(mysqli_query($conn, $sql)) http_response_code(200);

/*
//MUDANÇA iZAVLA
// ALTERAÇÃO (IZABELA) -> MANDAR EMAIL PARA A PESSOA QUE RESERVOU ESSE ITEM, AVISANDO O CANCELAMENTO DA RESERVA
$query_reserva = "SELECT * FROM reservas WHERE id_acervo=".$data->id."";

$result_nome = mysqli_query($conn, $query_nome);
$result_reserva = mysqli_query($conn, $query_reserva);
$existem_reservas = mysqli_num_rows($query_reserva);

$cont =0;
if($existem_reservas>0){ // Enviar um email para os alunos que reservaram
    while($as_reservas == mysqli_fetch_assoc($result_reserva)){
        $query_livro ="SELECT nome FROM acervo WHERE id='".$as_reservas['id_acervo']."'";
        $query_tabela_alunos = "SELECT * FROM alunos WHERE id='".$as_reservas['id_alunos']."'";
        $result_tabela_alunos = mysqli_query($query_tabela_alunos);
        $tabela_alunos = mysqli_fetch_assoc($result_tabela_alunos);
        $query_nome = $tabela_alunos['nome'];
        $query_email = $tabela_alunos['email'];
        $nome_livro = mysqli_query($conn, $query_livro);

        $configuracoes_email = new PHPMailer(true);



        try {
            $configuracoes_email->SMTPDebug = SMTP::DEBUG_SERVER;
            $configuracoes_email->isSMTP();
            $configuracoes_email->Host = 'smtp.gmail.com';
            $configuracoes_email->SMTPAuth = true;
            $configuracoes_email->Username = 'gerenciawebinf2a@gmail.com';
            $configuracoes_email->Password = 'IsaacIzabelaMarcela';
            $configuracoes_email->Port = 587;

            $configuracoes_email->setFrom('gerenciawebinf2a@gmail.com', "SIDA & SORA");
            $configuracoes_email->addAddress($query_email);

            $configuracoes_email->isHTML(true);
            $configuracoes_email->Subject = '[Email Gerado Automaticamente] Cadastro Efetuado com sucesso!';
            $configuracoes_email->Body = 
            "
                <!DOCTYPE html>
            <!-- HTML geral para páginas que sejam do tipo formulários -->
            <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>Manutenção Acervo</title>
                    <link rel=\"stylesheet\" href=\"email.css\">
                    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
                    <link href=\"https://fonts.googleapis.com/css2?family=Nunito&display=swap\" rel=\"stylesheet\">

                    <style>

                    @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
                    
                        /* CSS para estilizar páginas do tipo Formulário - Biblioteca 
                            *{
                                font-family: 'Nunito', sans-serif;
                            }
                        
                            html, body{
                                margin: 0%;
                            }
                            header, footer{
                                height: 5%;
                                background-color: #264553;
                                padding: 3%;
                            }
            
                            h1, h3, p, input{
                                font-family: 'Nunito', sans-serif;
                                color: white;
                                margin:0%;
                            }
            
                            h1{
                                font-size: 3em;
                                text-align: center;
                                margin-top: 5% 0%;
                            }
            
                            h3{
                                text-align: center;
                                font-size: 0.7em;
                            }
            
                            .sub, .msg{
                                color: #449d8f;
                                margin: 5% 0% .5% 0%;
                                font-size: 1em;
                            }
            
                            .principal{
                                color: #e76f51;
                                font-size: 1.5em;
                                margin: 0% 0% .5% 0%;
                            }
            
                            .descricao{
                                color: #264553;
                                font-size: 1em;
                                margin: 0% auto 1% auto;
                                width: 60vw;
                            }
            
                            .descricao, .principal, .subRosa{
                                text-align: center;
                            }
            
                            #ajuste{
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin: 1% 0% 5% 0%;
                            }
                            form{
                                display: block;
            
                            }
            
                            #botoes{
                                display: block;
                                margin-left: auto;
                                margin-right: auto;
                            }
            
                            .botoes{
                                width: 49.5%;
                                height: 4vh;
                                border-radius: .3em;
                                border: 0;
                                background-color: #e76f51;
                                color: white;
                                transition: .3s ease;
                                
                            }
                            .botoes:hover{
                                background-color: #449d8f;
                                cursor:pointer
                                
                            }
            
                            input{
                                color:#449d8f;
                                display: inline-block;
                            }
            
            
            
                            .texto{
                                width: 30vw;
                                border: 0;
                                outline: none;
                                border-bottom: 1.5px solid #449d8f ;
                                display: block;
                                margin: 0% 0% 5% 0%;
                            }
            
                            textarea{
                                width: 100%;
                                height: 10vh;
                                padding: 3%;
                                background-color: #449d8f;
                                color: white;
                                border: 0;
                                box-sizing: border-box;
                                font-family: 'Nunito', sans-serif;
                            }
                            textarea::placeholder{
                                color: white;
                            }
            
                            .msg{
                                margin: 1% 0% 5% 0%;
                            }
                            .logo{
                                display: block;
                                width: 20vh;
                                margin-left: auto;
                                margin-right: auto;
                            }
                            #logo-sida, #logo-sora{
                                display: inline-block;
                            }
                            
            
                        </style>

                </head>
            
                <body>
                    <header>
                        <h1>SIDA & SORA</h1>
                    </header>
                    <main>
                        <h3 class=\"sub\">Parabéns!!</h3>
                        <h1 class=\"principal\">Sua Cadastro Foi Efetuado com sucesso!</h1>
                        <p class=\"descricao\">Olá {$nome}! Este email foi enviado para informá-lo(a) que seu cadastro nos sistema SIDA e SORA foi confirmado!
                            Ficamos muito felizes com a sua entrada na família deste incrível sistema de acervo! A/O Convidamos para a outra obra existente em nossa biblioteca ou regular suas turmas usando nossso diário acadêmico!. 
                            
                            Atenciosamente, 
                            Equipes SIDA & SORA. 
                            
                        </p>
                        <h3 class=\"msg\">Este email foi enviado automáticamente, favor não responder. </h3>

                        </div>
                    </main>
                    <footer>
                        <h3>Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019©</h3>
                        <h3>Agradeçemos pela preferência</h3>
                    </footer>

                </body>
            </html>
                ";
                $configuracoes_email->AltBody = 'Cadastro Efetuado com Sucesso! Agradecemos pela participação!';

                if($configuracoes_email->send()) {
                    echo 'Email enviado com sucesso';
                } else {
                    echo 'Email nao enviado';
                }

                
            } catch (Exception $e) {
                echo "Erro ao enviar mensagem: {$configuracoes_email->ErrorInfo}";
        }
//MUDANÇA iZABELA

*/



mysqli_close($conn);

?>