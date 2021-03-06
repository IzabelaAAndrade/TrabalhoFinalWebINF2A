<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acervo | SORA</title>
        <link rel="stylesheet" href="style/geral_acervo.css">
        <link rel="stylesheet" href="style/msgs-descarte.css">
        <link rel="stylesheet" href="../index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="../../imgs/soraLogo.jpg" alt="logo" id="logo">
            <h1 id="titulo">Sistema de Organização de Acervo</h1>
            <div id="dados_user">
                <div id="aux">
                    <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                    <h2 id="sair"><a href="../sistema_login/logout.php">Sair</a></h2>
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
                        <li><a href="../manutencao_acervo/index_acervo.php">Acervo</a></li>
                        <li><a href="../manutenção_emprestimos/index.php">Empréstimos</a></li>
                    </ul>
                </li>
                <li><a href="../reservas/cria_reserva.php">Reservas</a></li>
                <li><a href="../relatorios/index.php">Relatórios</a></li>

            </ul>
        </nav>

        <main>
            <h3 class="sub">Bem-Vindo(a) à</h3>
            <h1 class="principal">Manutenção do Acervo</h1>
            <p class="descricao">Deseja inserir, alterar ou excluir itens de acervo? Para isso basta selecionar uma das opções abaixo!</p>

                <fieldset id="fieldset" class="tamanho">
                    <legend>Selecione ação deseja realizar</legend>
                    <select id="caixa-seleção">
                        <option value=" ">-- selecione uma opção --</option>
                        <option value="inserir">Inserir</option>
                        <option value="alterar">Alterar</option>
                        <option value="descarte">Excluir</option>
                    </select>

                    <div class="escondido mudar" id="inserir">
                        <form method="POST" action="php/Inserir_Acervo_Biblioteca.php">
                            <label for="id_tipo">Tipo</label>
                            <select name="tipo" id="tipo">
                                <option value=" ">-- selecione uma opção --</option>
                                <option id="livros" value="livros">Livros</option>
                                <option id="periodicos" value="periodicos">Periodicos</option>
                                <option id="academicos" value="academicos">Academicos</option>
                                <option id="midias" value="midias">Midias</option>

                            </select><br>

                            <div id="geral" class="escondido selecao">
                                <h2>Informações Gerais</h2>
                                <label for="id_id_campus">Id do Campus: </label>
                                <input class="texto" type="text" name="campus" id="id_campus" maxlength="255">
                                <label for="id_nome">Nome: </label>
                                <input class="texto" type="text" name="nome" id="id_nome" maxlength="255">
                                <label for="id_local">Local: </label>
                                <input class="texto" type="text" name="local" id="id_local" maxlength="255">
                                <label for="id_ano">Ano: </label>
                                <input class="texto" type="text" name="ano" id="id_ano" maxlength="255">
                                <label for="id_editora">Editora: </label>
                                <input class="texto" type="text" name="editora" id="id_editora" maxlength="255">
                                <label for="id_paginas">Nº de paginas: </label>
                                <input class="texto" type="text" name="paginas" id="id_paginas" maxlength="255">
                                <h2>Autores</h2>
                                <label for="id_autores">Nº Autores: </label>
                                <input class="texto" type="number" name="autores" id="id_autores" min="1">
                                <div class="quantidade_autores">
                                    <div class="autor">
                                        <h4>Autor 1:</h4>
                                        <label for="id_autor1">Nome Autor: </label>
                                        <input class="texto" type="text" name="autor[]" id="id_autor1" maxlength="40">
                                        <label for="id_sobrenome1">Sobrenome: </label>
                                        <input class="texto" type="text" name="sobrenome[]" id="id_sobrenome1" maxlength="40">
                                        <label for="id_ordem1">Ordem: </label>
                                        <input class="texto" type="text" name="ordem[]" id="id_ordem1"  maxlength="20">
                                        <label for="id_qualificacao1">Qualificação: </label>
                                        <input class="texto" type="text" name="qualificacao[]" id="id_qualificacao1" maxlength="20">
                                    </div>
                                </div>
                            </div>

                            <div id="livros" class="escondido selecao">
                                <h2>Informações Livros</h2>
                                <label for="id_edicao">Edição: </label>
                                <input class="texto" type="text" name="edicao" id="id_edicao" maxlength="200">
                                <label for="id_isbn">ISBN: </label>
                                <input class="texto" type="text" name="isbn" id="id_isbn" maxlength="13">
                            </div>

                            <div id="periodicos" class="escondido selecao">
                                <h2>Informações Periodicos</h2>
                                <label for="id_periodicidade">Periodicidade: </label>
                                <select id="combobox_period" name="periodicidade">
                                    <option value="diario">Diário</option>
                                    <option value="mensal">Mensal</option>
                                    <option value="anual">Anual</option>
                                    <option value="indefinido">Indefinido</option>
                                </select>
                                <label for="id_mes">Mês: </label>
                                <select id="combobox_mes" name="mes">
                                    <option value="jan">Janeiro</option>
                                    <option value="fev">Fevereiro</option>
                                    <option value="mar">Março</option>
                                    <option value="abr">Abril</option>
                                    <option value="mai">Maio</option>
                                    <option value="jun">Junho</option>
                                    <option value="jul">Julho</option>
                                    <option value="ago">Agosto</option>
                                    <option value="set">Setembro</option>
                                    <option value="out">Outubro</option>
                                    <option value="nov">Novembro</option>
                                    <option value="dez">Dezembro</option>
                                </select>
                                <label for="id_volume">Volume: </label>
                                <input class="texto" type="text" name="volume" id="id_volume" maxlength="255">
                                <label for="id_subtipoP">Subtipo: </label>
                                <select id="combobox_subtipoP" name="subtipoP">
                                    <option value="revista">revista</option>
                                    <option value="jornal">jornal</option>
                                    <option value="boletim">boletim</option>
                                </select>
                                <label for="id_issn">ISSN: </label>
                                <input class="texto" type="number" name="issn" id="id_issn" maxlength="8">

                                <h2>Partes</h2>
                                <label for="id_partes">Nº Partes: </label>
                                <input class="texto" type="number" name="partes" id="id_partes" min="1">
                                <div class="quantidade_partes">
                                    <div class="parte">
                                        <h4>Partes 1:</h4>
                                        <label for="id_titulo1">Titulo: </label>
                                        <input class="texto" type="text" name="titulo[]" id="id_titulo1" maxlength="40">
                                        <label for="id_inicio1">Pagina de Inicio: </label>
                                        <input class="texto" type="text" name="inicio[]" id="id_inicio1">
                                        <label for="id_fim1">Pagina Final: </label>
                                        <input class="texto" type="text" name="fim[]" id="id_fim1">
                                        <label for="id_chave1">Palavras-Chave: </label>
                                        <input class="texto" type="text" name="chave[]" id="id_chave1" maxlength="20">
                                    </div>
                                </div>
                            </div>

                            <div id="academicos" class="escondido selecao">
                                <h2>Informações Academicos</h2>
                                <label for="id_edicao">Programa: </label>
                                <input class="texto" type="text" name="programa" id="id_programa" maxlength="30">
                            </div>

                            <div id="midias" class="escondido selecao">
                                <h2>Informações Midias</h2>
                                <label for="id_data">Tempo: </label>
                                <input class="texto" type="number" name="tempo" id="id_tempo">
                                <label for="id_subtipo">Subtipo: </label>
                                <select class="combobox" id="combobox_subtipoM" name="subtipoM">
                                    <option value="cd">CD</option>
                                    <option value="dvd">DVD</option>
                                    <option value="fita">Fita</option>
                                    <option value="pendrive">PenDrive</option>
                                </select>
                            </div>

                            <div id="botoes" class="escondido selecao">
                                <input class="botoes" id="envia" type="submit">
                                <button class="botoes" id="limpar" type="reset">Limpar</button>
                            </div>
                        </form>
                    </div>

                    <div class="escondido mudar" id="alterar">
                      <form action="php/alterarAcervo.php" method="post">
                        <h2>Informações Gerais (Obrigatórias)</h2>
                        <label>ID do Campus: <input class="texto" type="number" name="id_campi" maxlength="30"></label>
                        <label>ID da Obra: <br><input class="texto" type="text" name="id_obra" maxlength="30"></label>
                        <label>Nome da Obra: <input class="texto" type="text" name="nome" maxlength="30"></label>
                        <label>ID do Acervo: <br><input class="texto" type="text" name="id_acervo" maxlength="30"></label>
                        <label>Local da Obra: <input class="texto" type="text" name="local" maxlength="30"></label>
                        <label>Ano de Publicação: <input class="texto" type="number" name="ano" maxlength="30"></label>
                        <label>Editora: <input class="texto" type="text" name="editora" maxlength="30"></label>
                        <label>Quantidade de Páginas: <input class="texto" type="number" name="paginas" maxlength="30"></label>
                        <label>Deseja alterar o quê?</label>
                        <select name="tipo" id="tipos">
                            <option id="gerais" value="gerais">Apenas informações gerais</option>
                            <option id="livros" value="livros">Livros</option>
                            <option id="periodicos" value="periodicos">Periódicos</option>
                            <option id="academicos" value="academicos">Acadêmicos</option>
                            <option id="midias" value="midias">Mídias</option>
                            <option id="autores" value="autores">Autores</option>
                        </select><br>

                        <div id="autores" class="escondido selecao">
                          <h2>Informações do Autor</h2>
                          <label>ID do Autor: <input class="texto" type="number" name="id_autor" maxlength="30"></label>
                          <label>Nome: <input class="texto" type="text" name="nome_autor" maxlength="30"></label>
                          <label>Sobrenome: <input class="texto" type="text" name="sobrenome_autor" maxlength="30"></label>
                          <label>Ordem: <input class="texto" type="number" name="ordem" maxlength="30"></label>
                          <label>Qualificação: <input class="texto" type="text" name="qualificacao" maxlength="30"></label>
                        </div>
                        <div id="livros" class="escondido selecao">
                          <h2>Informações do Livro</h2>
                          <label>Edição: <input type="number" name="edicao" class="texto" maxlength="30"> </label>
                          <label>ISBN: <input type="text" name="isbn" class="texto" maxlength="30"> </label>
                        </div>
                        <div id="academicos" class="escondido selecao">
                          <h2>Informações do Acadêmico</h2>
                          <label>Programa: <br><input class="texto" type="text" name="programa" maxlength="30"></label>
                        </div>
                        <div id="periodicos" class="escondido selecao">
                          <h2>Informações do Periódico</h2>
                          <label>Periodicidade:
                          <select id="combobox_period" name="periodicidade">
                              <option value="diario">Diário</option>
                              <option value="mensal">Mensal</option>
                              <option value="anual">Anual</option>
                              <option value="indefinido">Indefinido</option>
                          </select> </label>
                          <label>Mês:
                          <select id="combobox_mes" name="mes">
                              <option value="jan">Janeiro</option>
                              <option value="fev">Fevereiro</option>
                              <option value="mar">Março</option>
                              <option value="abr">Abril</option>
                              <option value="mai">Maio</option>
                              <option value="jun">Junho</option>
                              <option value="jul">Julho</option>
                              <option value="ago">Agosto</option>
                              <option value="set">Setembro</option>
                              <option value="out">Outubro</option>
                              <option value="nov">Novembro</option>
                              <option value="dez">Dezembro</option>
                          </select></label> <br>
                          <label>Volume: <input type="number" name="volume" class="texto" maxlength="30"> </label>
                          <label>Subtipo:
                            <select id="combobox_subtipoP" name="subtipoP">
                                <option value="revista">Revista</option>
                                <option value="jornal">Jornal</option>
                                <option value="boletim">Boletim</option>
                            </select>
                          </label>  <br>
                          <label>ISSN: <input type="number" name="issn" class="texto"> </label>
                          <h2>Partes</h2>
                          <label>Digite o ID da parte que deseja alterar: <input type="number" class="texto" maxlength="30" name="parte" min="0" placeholder="Digite 0 para não alterar nenhuma parte"> </label>
                          <label>Título: <input type="text" name="titulo" class="texto" maxlength="30" placeholder="Não precisa preencher se digitou 0"> </label>
                          <label>Página Inicial: <input type="number" name="pag_inicio" class="texto" maxlength="30" placeholder="Não precisa preencher se digitou 0"> </label>
                          <label>Página Final: <input type="number" name="pag_final" class="texto" maxlength="30" placeholder="Não precisa preencher se digitou 0"> </label>
                          <label>Palavras-Chave: <input type="text" name="palavras_chave" class="texto" maxlength="30" placeholder="Não precisa preencher se digitou 0"> </label>
                        </div>
                        <div id="midias" class="escondido selecao">
                          <label>Tempo: <input type="number" name="tempo" class="texto" maxlength="30"> </label>
                          <label> Subtipo:
                            <select class="combobox" id="combobox_subtipoM" name="subtipoM">
                              <option value="cd">CD</option>
                              <option value="dvd">DVD</option>
                              <option value="fita">Fita</option>
                              <option value="pendrive">PenDrive</option>
                          </select> </label>
                        </div>
                        <div id="botoes">
                            <input class="botoes" id="enviar" type="submit">
                            <button class="botoes" id="limpa" type="reset">Limpar</button>
                        </div>
                      </form>

                    </div>

                    <div class="escondido mudar" id="descarte">
                        <form method="post">
                            <div class="input-container">
                                <input placeholder="Operador" type="text" name="operador" class="descarte-data texto">
                            </div>
                            <div class="input-container">
                                <input placeholder="Id do acervo à ser descartado" type="number" name="id" class="descarte-data texto">
                            </div>
                            <div class="input-container">
                                <textarea placeholder="Motivos" name="motivos" id="motivos-txarea" class="descarte-data texto" cols="30" rows="10" maxlength="200"></textarea>
                            </div>
                        </form>
                        <div class="btn-container">
                            <button class="botoes" id="submit">Descatar</button>
                            <button class="botoes" id="cancel">Cancelar</button>
                        </div>
                    </div>
                </fieldset>


        </main>
        <script src="js/inserir_acervo.js"></script>

        <footer>
            <h3 class="rodape">© SORA - Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 do CEFET-MG</h3>
            <h3 class="rodape">Trabalho orientado pelo professor William Geraldo Sallum</h3>
        </footer>
    </body>
</html>
