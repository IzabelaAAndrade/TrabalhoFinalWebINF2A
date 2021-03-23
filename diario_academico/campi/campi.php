<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manutenção de Campi</title>
        <link rel="stylesheet" href="style/tmp.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="img/LogoExemploCortado.png" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="#">Campi</a></li>
                        <li><a href="#">Departamentos</a></li>
                        <li><a href="#">Cursos</a></li>
                        <li><a href="#">Turmas</a></li>
                        <li><a href="#">Alunos</a></li>
                        <li><a href="#">Professores</a></li>
                        <li><a href="#">Disciplinas</a></li>
                        <li><a href="#">Etapas</a></li>
                        <li><a href="#">Diários</a></li>
                    </ul>
                </li>
                <li><a href="#">Relatórios</a></li>
                <li><a href="#">Transferências</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>

        <main>
            <h3 class="sub">Bem-Vindo(a) à Manutenção de Campi</h3>
            <h1 class="principal">Manutenção de Campi</h1>
            <p class="descricao">
              O que deseja fazer?
            </p>
            <div id="ajuste">
              <form action="inseriCampi.html">
                  <div id="divBotoes">
                      <input class="botoes" id="envia" value="Inserir" type="submit">
                  </div>
              </form>
              <form action="alterarCampi.html">
                  <div id="divBotoes">
                      <input class="botoes" id="envia" value="Alterar" type="submit">
                  </div>
              </form>
              <form action="deletarCampi.html">
                  <div id="divBotoes">
                      <input class="botoes" id="envia" value="Deletar" type="submit">
                  </div>
              </form>
            </div>
            <?php
            $dbhost="localhost";
            $dbuser="root";
            $dbpass="";
            $dbname="academico";
            $con = mysqli_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
            $sel = mysqli_select_db($con,$dbname);

            $sql=mysqli_query($con,"SELECT * FROM campi") or die(mysqli_error());
            $rows=mysqli_num_rows($sql);
            if($rows>0){
              $result = mysqli_fetch_array($sql);
              echo "<table>";
              echo "<tr>";
              echo "<th>ID</th><th>NOME</th><th>CIDADE</th><th>UF</th>";
              echo "</tr>";
                while ($result) {
                  echo "<tr>";
                  echo '<td> '.$result['id'].'</td><td>'.$result['nome'].'</td><td>'.$result['cidade'].'</td><td>'.$result['uf'].'</td>';
                  echo "</tr>";
                  $result = mysqli_fetch_array($sql);
                }

                echo "</table>";
            }
            else {
              echo "<p style=\"text-align: center;\">Nenhum campus cadastrado.</p>";
            }
            ?>
        </main>
    </body>
    <footer style="margin-top: 50px;">
        <h3 class="rodape">© NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
    <script src="js/filtros.js"></script>
    <script src="js/relator.js"></script>
    <script src="js/main.js"></script>
</html>
