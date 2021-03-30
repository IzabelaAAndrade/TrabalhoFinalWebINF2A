<?php
@session_start();
include '../../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Controle de Presenças</title>
    <link rel="stylesheet" href="style/geral_presenças.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <img src="../../../imgs/sidaLogo.jpg" alt="logo" id="logo" />
      <h1 id="titulo">Sistema Diário Acadêmico</h1>
      <div id="aux">
            <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
            <h2 id="sair"><a href="../../../sistema_login/logout.php">Sair</a></h2>
        </div>
    </header>

    <nav>
      <ul class="menu">
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../../sobre.html">Sobre</a></li>
        <li><a href="#">Manutenção</a>
            <ul class="sub_menu">
                <li><a href="../../campi/campi.php">Campi</a></li>
                <li><a href="../../manutencao_departamentos/index.html">Departamentos</a></li>
                <li><a href="../../manutencao_cursos/">Cursos</a></li>
                <li><a href="../../manutencao_turmas/">Turmas</a></li>
                <li><a href="../../manutencao_alunos/">Alunos</a></li>
                <li><a href="../../manutencao_professores/">Professores</a></li>
                <li><a href="../../manutencao_disciplinas/">Disciplinas</a></li>
                <li><a href="../../manutencao_etapas/">Etapas</a></li>
                <li><a href="../../manutencao_diarios/index.html">Diários</a></li>
            </ul>
        </li>
        <li><a href="../../menu_relatorios/index.html">Relatórios</a>
              <ul class="sub_menu">
                  <li><a href="../../menu_relatorios/relatorio_certificado/index.html">Certificados</a></li>
                  <li><a href="../../menu_relatorios/relatorio_historico/index.html">Histórico por Aluno e Turma</a></li>
                  <li><a href="../../menu_relatorios/relatorio_alunos/index_relatorio_aluno.html">Relação de Alunos</a></li>
                  <li><a href="../../menu_relatorios/relatorio_relacao_conteudo/index.php">Relação de Conteúdos</a></li>
                  <li><a href="../../menu_relatorios/relatorio_professores/index.html">Relação de Professores</a></li>
              </ul>
          </li>
        <li><a href="../../transferencia_alunos/">Transferências</a></li>
      </ul>
    </nav>

    <main>
      <h3 class="sub">Bem-Vindo(a) à</h3>
      <h1 class="principal">Controle de Presenças</h1>
      <p class="descricao">
        Deseja inserir, alterar ou excluir algo no Controle de Presenças? Para
        isso basta selecionar uma das opções abaixo!
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
            <label for="ins_conteudo">Id do Conteudo: </label>
            <input
              class="texto"
              type="text"
              name="id_conteudos"
              id="ins_conteudo"
            />
            <label for="ins_atividade">ID da Atividade: </label>
            <input
              class="texto"
              type="number"
              name="id_atividades"
              id="ins_atividade"
            />
            <div id="ins_botoes1" class="centro">
              <button class="botoes" type="submit">Buscar</button>
            </div>
            <div id="ins_tabela">
              <table>
                <thead>
                  <tr>
                    <th colspan="3">Alunos</th>
                    <!--4-->
                  </tr>
                  <tr>
                    <th>Matricula</th>
                    <!-- <th>Nome</th> -->
                    <th>Faltas</th>
                    <th>Nota</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input
                        class="input_text"
                        type="text"
                        name="id_matriculas[]"
                        value=""
                        readonly
                      />
                    </td>
                    <!--                     <td>
                      <input
                        class="input_text"
                        type="text"
                        name="nome"
                        id="ins_nome"
                        disabled
                      />
                    </td> -->
                    <td>
                      <input
                        class="input_num"
                        type="number"
                        name="faltas[]"
                        value="0"
                        min="0"
                      />
                    </td>
                    <td>
                      <input
                        class="input_num"
                        type="number"
                        name="nota[]"
                        value="0"
                        min="0"
                      />
                    </td>
                  </tr>
                </tbody>
              </table>
              <div id="ins_botoes2" class="centro">
                <button class="botoes" type="submit">Enviar</button>
              </div>
            </div>
          </form>
        </div>

        <div class="escondido mudar" id="alterar">
          <form>
            <label for="alt_conteudo">Id do Conteudo: </label>
            <input
              class="texto"
              type="text"
              name="id_conteudos"
              id="alt_conteudo"
            />
            <label for="alt_atividade">ID da Atividade: </label>
            <input
              class="texto"
              type="number"
              name="id_atividades"
              id="alt_atividade"
            />
            <div id="alt_botoes1" class="centro">
              <button class="botoes" type="submit">Buscar</button>
            </div>
            <div id="tabela">
              <table>
                <thead>
                  <tr>
                    <th colspan="3">Atividades</th>
                  </tr>
                  <tr>
                    <th>Matricula</th>
                    <!-- <th>Nome</th> -->
                    <th>Faltas</th>
                    <th>Nota</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input
                        class="input_text"
                        type="text"
                        name="id_matriculas[]"
                        value=""
                        readonly
                      />
                    </td>
                    <!--                     <td>
                      <input
                        class="input_text"
                        type="text"
                        name="nome"
                        id="ins_nome"
                        disabled
                      />
                    </td> -->
                    <td>
                      <input
                        class="input_num"
                        type="number"
                        name="faltas[]"
                        value="0"
                        min="0"
                      />
                    </td>
                    <td>
                      <input
                        class="input_num"
                        type="number"
                        name="nota[]"
                        value="0"
                        min="0"
                      />
                    </td>
                  </tr>
                </tbody>
              </table>
              <div id="alt_botoes2" class="centro">
                <button class="botoes" type="submit">Alterar</button>
              </div>
            </div>
          </form>
        </div>

        <div class="escondido mudar" id="deletar">
          <form>
            <label for="del_conteudo">Id do Conteudo: </label>
            <input
              class="texto"
              type="text"
              name="id_conteudos"
              id="del_conteudo"
            />
            <label for="del_atividade">ID da Atividade: </label>
            <input
              class="texto"
              type="number"
              name="id_atividades"
              id="del_atividade"
            />
            <div id="del_botoes" class="centro">
              <button class="botoes" type="submit">Excluir</button>
            </div>
          </form>
        </div>
      </fieldset>
    </main>
    <script src="js/presenças.js"></script>
    <footer>
      <h3 class="rodape">
        © NOME - Orgulhosamente criado pela turma de Informática 2A de ingresso
        em 2019 do CEFET-MG
      </h3>
      <h3 class="rodape">
        Trabalho orientado pelo professor William Geraldo Sallum
      </h3>
    </footer>
  </body>
</html>
