<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Departamentos</title>
    <link rel="stylesheet" href="style/geral_departamentos.css" />
    <link rel="stylesheet" href="../index_diario.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header id="header-esp">
      <img src="../../imgs/sidaLogo.jpg" alt="logo" id="logo" />
      <h1 id="titulo">Sistema de Diário Acadêmico</h1>
      <div id="dados_user">
        <div id="aux">
            <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
            <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
        </div>
      </div>  
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

    <main>
      <h3 class="sub">Bem-Vindo(a) à</h3>
      <h1 class="principal">Departamentos</h1>
      <p class="descricao">
        Deseja inserir, alterar ou excluir Departamentos? Para isso basta
        selecionar uma das opções abaixo!
      </p>

      <fieldset id="fieldset" class="tamanho">
        <legend>Selecione ação deseja realizar</legend>
        <select id="caixa-seleção">
          <option value=" ">-- selecione uma opção --</option>
          <option value="inserir">Inserir</option>
          <option value="alterar">Alterar</option>
          <option value="deletar">Excluir</option>
        </select>

        <div class="escondido mudar" id="inserir">
          <form>
            <label for="ins_nome">Nome do Departamento: </label>
            <input class="texto" type="text" name="nome" id="ins_nome" />
            <label for="ins_campi">ID do Campi: </label>
            <input
              class="texto"
              type="number"
              name="id_campi"
              id="ins_id_campi"
            />
            <div id="botoes">
              <input class="botoes" id="ins_envia" type="submit" />
              <button class="botoes" id="ins_limpar" type="reset">
                Limpar
              </button>
            </div>
          </form>
        </div>

        <div class="escondido mudar" id="alterar">
          <form>
            <div id="tabela">
              <table>
                <thead>
                  <tr>
                    <th colspan="4">Departamentos</th>
                  </tr>
                  <tr>
                    <th>ID</th>
                    <th>ID Campi</th>
                    <th>Nome Campi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>00</td>
                    <td>1</td>
                    <td>Decom</td>
                    <td>
                      <button class="btnAlterar" type="button">Alterar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="formulario" class="escondido">
              <input type="hidden" name="id" id="alt_id" />
              <label for="alt_nome">Nome: </label>
              <input class="texto" type="text" name="nome" id="alt_nome" />
              <label for="alt_id_campi">ID do Campi: </label>
              <input
                class="texto"
                type="number"
                name="id_campi"
                id="alt_id_campi"
              />
              <div id="botoes">
                <input class="botoes" id="alt_envia" type="submit" />
                <button class="botoes" id="alt_limpar" type="reset">
                  Limpar
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="escondido mudar centro" id="deletar">
          <form>
            <table>
              <thead>
                <tr>
                  <th colspan="4">Departamentos</th>
                </tr>
                <tr>
                  <th></th>
                  <th>ID</th>
                  <th>ID Campi</th>
                  <th>Nome Campi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="radio" name="dpto" class="exclui_dpto" />
                  </td>
                  <td>00</td>
                  <td>1</td>
                  <td>Decom</td>
                </tr>
              </tbody>
            </table>
            <div id="inputs" class="escondido">
              <input type="hidden" name="id" id="del_id" />
              <input type="hidden" name="id_campi" id="del_id_campi" />
              <input type="hidden" name="nome" id="del_nome" />
            </div>
            <div id="botoes">
              <button class="botoes" type="submit">Excluir</button>
            </div>
          </form>
        </div>
      </fieldset>
    </main>
    <script src="js/main.js"></script>
    <footer>
      <h3 class="rodape">
        © SIDA - Orgulhosamente criado pela turma de Informática 2A de ingresso
        em 2019 do CEFET-MG
      </h3>
      <h3 class="rodape">
        Trabalho orientado pelo professor William Geraldo Sallum
      </h3>
    </footer>
  </body>
</html>
