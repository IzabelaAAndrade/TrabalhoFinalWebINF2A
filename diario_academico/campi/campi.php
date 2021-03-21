<!DOCTYPE html>
<!-- HTML geral para páginas que sejam do tipo formulários -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manutenção de Campi</title>
        <link rel="stylesheet" href="../../padrao_estilizacao/diario_academico/paginas_com_formularios/geral.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Diário Acadêmico</h1>
        </header>
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
              echo "<th></th>";
              echo "</tr>";
                while ($result) {
                  echo "<tr>";
                  echo '<td>ID: '.$result['id'].'</td><td>'.$result['nome'].'</td><td>'.$result['cidade'].'</td><td>'.$result['uf'].'</td>';
                  echo "</tr>";
                  $result = mysqli_fetch_array($sql);
                }

                echo "</table>";
            }
            else {
              echo "Nenhum campus cadastrado.";
            }
            ?>
        </main>
        <footer>
            <h3>Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019©</h3>
        </footer>
        <script src="limpa.js"></script>
    </body>
</html>
