<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Campi | SIDA</title>
        <link rel="stylesheet" href="style/tmp.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="../../imgs/sidaLogo.jpg" alt="logo" id="logo">
            <h1 id="titulo">Sistema Diário Acadêmico</h1>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="../../sistema_login/index.php">Início</a></li>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../sobre.php">Sobre</a></li>
                <li><a href="#">Manutenção</a>
                    <ul class="sub_menu">
                        <li><a href="../campi/campi.php">Campi</a></li>
                        <li><a href="../manutencao_departamentos/index.php">Departamentos</a></li>
                        <li><a href="../manutencao_cursos/index.php">Cursos</a></li>
                        <li><a href="../manutencao_turmas/index.php">Turmas</a></li>
                        <li><a href="../manutencao_alunos/index.php">Alunos</a></li>
                        <li><a href="../manutencao_professores/">Professores</a></li>
                        <li><a href="../manutencao_disciplinas/disciplinas_index.php">Disciplinas</a></li>
                        <li><a href="../manutencao_etapas/index.php">Etapas</a></li>
                        <li><a href="../manutencao_diarios/index.php">Diários</a></li>
                    </ul>
                </li>
                <li><a href="../menu_relatorios/index.php">Relatórios</a>
                <ul class="sub_menu">
                    <li><a href="../menu_relatorios/relatorio_certificado/index.php">Certificados</a></li>
                    <li><a href="../menu_relatorios/relatorio_historico/index.php">Histórico por Aluno e Turma</a></li>
                    <li><a href="../menu_relatorios/relatorio_alunos/index_relatorio_aluno.php">Relação de Alunos</a></li>
                    <li><a href="../menu_relatorios/relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                    <li><a href="../menu_relatorios/relatorio_professores/index.php">Relação de Professores</a></li>
                </ul>
                </li>
                </li>
                <li><a href="../transferencia_alunos/index.php">Transferências</a></li>
            </ul>
        </nav>

        <main style="margin-top: 20vh;">
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
    <footer style="margin-top: 10%;">
        <h3 class="rodape">© SORA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
        <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
    </footer>
    <script src="js/filtros.js"></script>
    <script src="js/relator.js"></script>
    <script src="js/main.js"></script>
</html>
