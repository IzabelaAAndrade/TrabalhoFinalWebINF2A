<?php
@session_start();
include '../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SORA | Sobre</title>
    <link rel="stylesheet" href="sobre_geral.css">
    <link rel="stylesheet" href="sobre.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <header>
        <div id="#header-div">
            <img src="../imgs/soraLogo.jpg" alt="logo" id="logo">
            <h1 id="titulo">Sistema de Organização de Acervo</h1>
        </div>
        <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo ($_SESSION['nome_user']); ?></h2>
                <h2 id="sair"><a href="../sistema_login/logout.php">Sair</a></h2>
            </div>
        </div>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="../sistema_login/index.php">Início</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="#">Manutenção</a>
                <ul class="sub_menu">
                    <li><a href="manutencao_acervo/index_acervo.php">Acervo</a></li>
                    <li><a href="manutenção_emprestimos/index.php">Empréstimos</a></li>
                </ul>
            </li>
            <li><a href="reservas/cria_reserva.php">Reservas</a></li>
            <li><a href="relatorios/index.php">Relatórios</a></li>

        </ul>
    </nav>
    <main>
        <h3 class="sub">Um pouco mais </h3>
        <h1 class="principal">Sobre o SORA</h1>
        <p id="esp" class="descricao">Hora de conhecer mais sobre este sistema e seus desenvolvedores</p>

        <h1> QUEM FAZ </H1>
        <p> Aqui temos algumas informações sobre as garotas que trouxeram esta página para a realidade. Um pouco sobre estas
            estudantes, pesquisadoras e desenvolvedoras.


            <!--Grupo A-->
        <div class="pessoas">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesA">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/A/iza3.jpg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Izabela A. Andrade </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Uma doidinha completamente apaixonada por livros (e personagens
                                fictícios), que não vive sem música. 🤍
                                <br><br>“I may not be able to cure cancer or end world hunger, but small kindnesses go a long
                                way.”
                                <br> They Both Die At The End, Adam Silvera
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesA">
                        <img src="../grupos_imgs/A/marcela.jpg" class="imgSobre">
                        <h3 class="sobreNome"> Marcela Prata Silvério </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Olá! Sou uma pessoa apaixonada por animais, livros, séries e que edita vídeos nas horas vagas! =) </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesA">
                        <img src="../grupos_imgs/A/isaac.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> Isaac Portela</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Поклонник онлайн-игр.
                                <br>“Не создавайте себе ограничений. Вы должны зайти так далеко, насколько позволяет ваш
                                разум. То, чего вы хотите больше всего, может быть достигнуто." – Mary Kay Ash
                            </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo B-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsB" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsB" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsB" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsB" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesB">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/B/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Arthur Coelho de Souza</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu texto
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesB">
                        <img src="../grupos_imgs/B/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> Pedro Henrique Yagi </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu Texto </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesB">
                        <img src="../grupos_imgs/B/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> Rubem Muzzi Mortimer</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu Texto </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsB" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsB" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo C-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsC" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsC" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsC" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsC" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesC">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/C/gabriel.jpg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Gabriel Coelho dos Santos</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">Um programador viciado em música coreana e livros de fantasia, e que procrastina assistindo vídeos sobre linguística.
                                <br>"A vida não é um quebra-cabeças que pode ser resolvido apenas uma vez e pronto. Você acorda todos os dias e o resolve novamente."
                                <br>- Chidi Anagonye, 'The Good Place' 4x09
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesC">
                        <img src="../grupos_imgs/C/giovana.jpg" class="imgSobre">
                        <h3 class="sobreNome"> Giovana Caroba Bragio dos Santos </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">"Happiness can be found, even in the darkest of times, if one only remembers to turn on the light."
                                <br>- Albus Dumbledore
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesC">
                        <img src="../grupos_imgs/C/joao.jpg" class="imgSobre">
                        <h3 class="sobreNome"> João Vitor Lima Gomes</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">"We made these memories for ourselves."
                                <br>- Ed Sheeran
                            </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsC" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsC" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <!--Grupo D-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsD" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsD" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsD" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsD" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesD">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/D/gabriel.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Gabriel Gonçalves de Souza Ribeiro</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Apenas um gay que, procurando o que fazer da vida, veio parar em Informática. Was I supposed to be here???<br><br>#ForaBolsonaro
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesD">
                        <img src="../grupos_imgs/D/bruna.png" class="imgSobre">
                        <h3 class="sobreNome"> Bruna Carvalho Peixoto Sanches </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Em construção. </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesD">
                        <img src="../grupos_imgs/D/raquel.jpg" class="imgSobre">
                        <h3 class="sobreNome"> Raquel Alexsandra do Couto</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Em construção. </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsD" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsD" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo E-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsE" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsE" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsE" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsE" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesE">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/E/img_duda.jpg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Maria Eduarda Carmona Banhos</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Atriz que se perde no papel de programadora.<br>"Anyway, the wind blows, doesn’t really matter to me" - Bohemian Rhapsody, Queen
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesE">
                        <img src="../grupos_imgs/E/janine.png" class="imgSobre">
                        <h3 class="sobreNome"> Janine de Amorim Teodoro </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Apaixonada por viajar, sair com os amigos e passar um tempo com a família.
                                <br>Tentando fortemente pensar fora da caixinha.
                                <br>"The best way to not feel hopeless is to get up and do something."
                                <br> -Barack Obama-
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesE">
                        <img src="../grupos_imgs/E/victor_wilson.jpg" class="imgSobre">
                        <h3 class="sobreNome"> Victor Wilson Medeiros da Silva</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Sou uma pessoa apaixonada por livros de suspense e por música coreana. 
                            <br>“No matter what happens in life, be good to people. Being good to people is a wonderful legacy to leave behind.” 
                            <br> –Taylor Swift- </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsE" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsE" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo F-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsF" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsF" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsF" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsF" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesF">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/F/mayara.jpg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Mayara do Carmo Mendes</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">
                                “Não há nessa vida algo que não se possa alcançar, você só precisa ir buscar!”
                                <br>Mire as estrelas - Rosa de Saron
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesF">
                        <img src="../grupos_imgs/F/lucas.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> Lucas Gabriel Pimenta Moreira </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">
                                Na busca dos meus sonhos, “Determinarás tu algum negócio, e ser-te-á firme, e a luz brilhará em teus caminhos”
                                <br>Jó 22:28
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item slidesF">
                        <img src="../grupos_imgs/F/tassyla.jpg" class="imgSobre">
                        <h3 class="sobreNome"> Tássyla Lissa Lima</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">
                                Um grãozinho de areia nesse mundo tentando evoluir a cada dia.<br>
                                Jesus, família e amigos = tudo pra mim 🤍<br>
                                “It’s not what the world holds for you, it’s what you bring to it”<br>
                                Anne With An E
                            </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsF" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsF" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo G-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsG" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsG" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsG" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsG" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesG">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/G/fer.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Pedro Matheus Simões Ferreira</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> "Any blade takes a few spins to get right. I'm sure this won't be any different"<br>~Tyson Granger
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesG">
                        <img src="../grupos_imgs/G/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> João Marcos de Sousa Rezende </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu Texto </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesG">
                        <img src="../grupos_imgs/G/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> David Nunes Ribeiro</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu Texto </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsG" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsG" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo h-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsH" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsH" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsH" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsH" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesH">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/H/joaofrancisco.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 João Francisco Carvalho Soares de Oliveira Queiroga</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Nerd viciado em jogos, animes e algumas séries. Especialista em desculpas para procrastinar.
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesH">
                        <img src="../grupos_imgs/H/olson.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> Pedro Henrique Alves de Abreu Campos </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> JoJofag, lolzeiro, entusiasta do rap e futuro cadidato a ex-presidente do Brasil </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesH">
                        <img src="../grupos_imgs/H/mateusleal.png" class="imgSobre">
                        <h3 class="sobreNome"> Mateus Leal Sobreira</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">Estudante de Informática no CEFET-MG e aspirante a desenvolvedor de Jogos</p>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsH" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsH" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Grupo I-->
        <div class="pessoas">
            <div id="carouselExampleIndicatorsI" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicatorsI" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicatorsI" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicatorsI" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner slidesI">
                    <div class="carousel-item active">
                        <img src="../grupos_imgs/I/vinicius.jpeg" class="imgSobre">
                        <h3 class="sobreNome"> 👑 Vinícius Assis Lima</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos">
                                “And I knew exactly what to do. But in a much more real sense, I had no idea what to do.”
                                <br>Michael Scott
                            </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesI">
                        <img src="../grupos_imgs/I/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> Davi Santos </h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu Texto </p>

                        </div>
                    </div>
                    <div class="carousel-item slidesI">
                        <img src="../grupos_imgs/I/sua_img.png" class="imgSobre">
                        <h3 class="sobreNome"> Henrique Matos</h3>
                        <div class="sobreCorpo">
                            <p class="sobreParagrafos"> Seu Texto </p>

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsI" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsI" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


    </main>
    <footer>
        <h3 class="rodape">© SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
    <script src="limpa.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
