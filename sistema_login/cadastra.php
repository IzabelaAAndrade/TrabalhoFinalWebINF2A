<?php

require_once('../envio_de_emails/src/PHPMailer.php');
require_once('../envio_de_emails/src/SMTP.php');
require_once('../envio_de_emails/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    session_start();
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'cadastros');



    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        $_SESSION['cadastrado'] = 1;
        header('Location: tela_cadastro.php');
        exit();
    }

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, /*DB*/) or die("Não foi possivel conectar");

    include 'cria_BD.php';

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']); 
    $email = mysqli_real_escape_string($conexao, $_POST['email']); 
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sqlPesquisa = "SELECT* FROM usuarios WHERE email = '$email';";
    $query = mysqli_query($conexao, $sqlPesquisa);
    $resultado = mysqli_fetch_assoc($query);

    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', md5('$senha'))";

    if(empty($resultado)){ //Caso seja um novo cadatro
        mysqli_query($conexao, $query) or die ("Erro ao cadastrar".mysqli_error($conexao) . "<br>");
        header('Location: tela_cadastro.php');
        $_SESSION['cadastrado'] = 0;



        //Enviar email
        $configuracoes_email = new PHPMailer(true);


        //String com o conteúdo do Emai
        $conteudo_email =  file_get_contents($email);


        try {
            $configuracoes_email->SMTPDebug = SMTP::DEBUG_SERVER;
            $configuracoes_email->isSMTP();
            $configuracoes_email->Host = 'smtp.gmail.com';
            $configuracoes_email->SMTPAuth = true;
            $configuracoes_email->Username = 'contatosidaesora@gmail.com';
            $configuracoes_email->Password = 'Tp@final12';
            $configuracoes_email->Port = 587;

            $configuracoes_email->setFrom('contatosidaesora@gmail.com', "SIDA & SORA");
            $configuracoes_email->addAddress($email);

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
                
                    /* CSS para estilizar páginas do tipo Formulário - Biblioteca */
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
        
       // header('Location: tela_cadastro.php');
        exit();
    }else{ //Caso ja exista o cadastro
        $_SESSION['cadastrado'] = 2;
        header('Location: tela_cadastro.php');
        exit();
    }

    mysqli_close($conexao);

?>