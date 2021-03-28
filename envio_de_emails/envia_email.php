<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$configuracoes_email = new PHPMailer(true);

$email = "email.html";

//String com o conteúdo do Emai
$conteudo_email =  file_get_contents($email);


try {
	$configuracoes_email->SMTPDebug = SMTP::DEBUG_SERVER;
	$configuracoes_email->isSMTP();
	$configuracoes_email->Host = 'smtp.gmail.com';
	$configuracoes_email->SMTPAuth = true;
	$configuracoes_email->Username = 'gerenciawebinf2a@gmail.com';
	$configuracoes_email->Password = 'IsaacIzabelaMarcela';
	$configuracoes_email->Port = 587;

	$configuracoes_email->setFrom('gerenciawebinf2a@gmail.com');
	$configuracoes_email->addAddress('tatitassyla@gmail.com');
    $configuracoes_email->addAddress('mayara.mendes.mdc@gmail.com');

	$configuracoes_email->isHTML(true);
	$configuracoes_email->Subject = '[Email Gerado Automaticamente] Teste de Envio de Emails, Sistema SORA';
	$configuracoes_email->Body = $conteudo_email;
	$configuracoes_email->AltBody = '[Email Teste] Sistema SORA de acervo!';

	if($configuracoes_email->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$configuracoes_email->ErrorInfo}";
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
    $configuracoes_email->Port = 587;

    //email propriamente dito
    $configuracao_email->setFrom('gerenciawebinf2a@gmail.com');
    $configuracao_email->addAddress('gerenciawebinf2a@gmail.com');

    //Habilitar que o email é HTML
    $configuracao_email->isHTML(true);
    $configuracao_email->Subject="[NÃO RESPONDA] Teste de Emails: SORA SISTEMA DE ACERVO VIRTUAL.";
    $configuracao_email->Body =
    */
?>