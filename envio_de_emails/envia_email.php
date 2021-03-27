<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'gerenciawebinf2a@gmail.com';
	$mail->Password = 'IsaacIzabelaMarcela';
	$mail->Port = 587;

	$mail->setFrom('gerenciawebinf2a@gmail.com');
	$mail->addAddress('contatobelaaa@gmail.com.br');

	$mail->isHTML(true);
	$mail->Subject = 'Teste de email via gmail Canal TI';
	$mail->Body = 
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
            </head>
            <style>
            /* CSS para estilizar páginas do tipo Formulário - Biblioteca */
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
                    margin: 0%;
                }

                h1{
                    font-size: 1em;
                    text-align: center;
                    margin-top: 2%;
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
                #logo{
                    display: block;
                    width: 20vh;
                    margin-left: auto;
                    margin-right: auto;
                }

            </style>
            <body>
                <header>
                    <img src=\"imgs/LogoExemplo.png\" alt=\"logo\" id=\"logo\">
                    <h1>Sistema de Biblioteca</h1>
                </header>
                <main>
                    <h3 class=\"sub\">Infelizmente as notícias não são boas :(</h3>
                    <h1 class=\"principal\">Sua Reserva foi cancelada</h1>
                    <p class=\"descricao\">Olá [nome da pessoa]! Este email foi enviado para informá-lo(a) que sua Reserva
                        do livro [nome do livro reservado] foi cancelada devido à exclusão do mesmo de  nosso acervo literário. 
                        Nos desculpamos pelo incoveniente e o/a convidamos para reservar outra obra existente em nossa biblioteca. 
                        
                        Atenciosamente, 
                        Equipe [nome do sistema]. 
                        
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
	$mail->AltBody = 'Chegou o email teste do Canal TI';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

/*
// Importação dos arquivos e classes necessárias
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$configuracao_email = new PHPMailer(true);

try{ // Configurar o email

    $configuracao_email->SMTPDebug = SMTP::DEBUG_SERVER;
    //Para funcionar, msg autenticada:
    $configuracao_email->isSMTP();
    $configuracao_email->Host = 'smtp.gmail.com';
    $configuracao_email->SMTPAuth = true;

    //Configurar o usuário e a senha do local de envio do  email.
    $configuracao_email->Username = 'gerenciawebinf2a@gmail.com';
    $configuracao_email->Password = 'IsaacIzabelaMarcela';
    //Porta pela passagem do SMTP
    $mail->Port = 587;

    //email propriamente dito
    $configuracao_email->setFrom('gerenciawebinf2a@gmail.com');
    $configuracao_email->addAddress('gerenciawebinf2a@gmail.com');

    //Habilitar que o email é HTML
    $configuracao_email->isHTML(true);
    $configuracao_email->Subject="[NÃO RESPONDA] Teste de Emails: SORA SISTEMA DE ACERVO VIRTUAL.";
    $configuracao_email->Body =
    */
?>