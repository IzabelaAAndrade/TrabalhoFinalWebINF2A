<?php
    @session_start();
    include '../../sistema_login/verifica_login.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção de Etapas - Diário Acadêmico</title>
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/menu.css">
</head>
<body>
    <header>
        <img src="assets/img/LogoExemploCortado.png" alt="logo" id="logo">
        <h1>Sistema Diário Acadêmico</h1>
        <div id="dados_user">
            <div id="aux">
                <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
                <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
            </div>
        </div>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="../">Home</a></li>
            <li><a href="../sobre.html">Sobre</a></li>
            <li><a href="#">Manutenção</a>
            <ul class="sub_menu">
                <li><a href="../campi/campi.php">Campi</a></li>
                <li><a href="../manutencao_departamentos/">Departamentos</a></li>
                <li><a href="../manutencao_cursos/">Cursos</a></li>
                <li><a href="../manutencao_turmas/">Turmas</a></li>
                <li><a href="../manutencao_alunos/">Alunos</a></li>
                <li><a href="../manutencao_professores/">Professores</a></li>
                <li><a href="../manutencao_disciplinas/">Disciplinas</a></li>
                <li><a href="#">Etapas</a></li>
                <li><a href="../manutencao_diarios/">Diários</a></li>
            </ul>
            </li>
            <li><a href="../menu_relatorios/">Relatórios</a>
            <ul class="sub_menu">
                <li><a href="../menu_relatorios/relatorio_certificado/">Certificados</a></li>
                <li><a href="../menu_relatorios/relatorio_historico/">Histórico por Aluno e Turma</a></li>
                <li><a href="../menu_relatorios/relatorio_alunos/index_relatorio_aluno.html">Relação de Alunos</a></li>
                <li><a href="../menu_relatorios/relatorio_relacao_conteudo/">Relação de Conteúdos</a></li>
                <li><a href="../menu_relatorios/relatorio_professores/">Relação de Professores</a></li>
            </ul>
            </li>
            <li><a href="../transferencia_alunos/">Transferências</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="list-container">
            <h3 class="sub">Bem-vindo(a) à</h3>
            <h1 class="principal">Manutenção de Etapas</h1>
            <section class="description">
                <p>Aqui você consegue criar, ver, editar e excluir as Etapas do sistema</p>
            </section>
            <div class="fieldset-container">
                <fieldset>
                    <legend>Selecione a ação que deseja realizar</legend>
                    <div class="select-container">
                        <select name="action" class="caixa-selecao">
                            <option value="list">Listar</option>
                            <option value="inserir">Inserir</option>
                            <option value="alterar">Alterar</option>
                            <option value="excluir">Excluir</option>
                        </select>
                    </div>
                    <div class="table-container">
                        <?php include 'php/list_etapas.php'; ?>
                    </div>
                    <div class="form-container action-div hidden" id="insert-container">
                        <h2>Criar nova Etapa</h2>
                        <div class="pseudo-form">
                            <div class="input-container">
                                <input type="number" name="ordem" class="etapas-data" required>
                                <label for="ordem">Ordem</label>
                            </div>
                            <div class="input-container">
                                <input type="number" name="valor" class="etapas-data" maxlength="5" required>
                                <label for="valor">Valor</label>
                            </div>
                        </div>
                        <div class="btn-container">
                            <button id="submit-criar" class="btn">Criar</button>
                            <button class="btn back-btn">Cancelar</button>
                        </div>
                    </div>
                    <div class="form-container action-div hidden" id="edit-container">
                        <h2>Editar Etapa</h2>
                        <div class="pseudo-form">
                            <div class="input-container">
                                <input type="number" name="id_old" class="edit-data" placeholder="Ordem da Etapa à ser alterada">
                            </div>
                            <div class="input-container">
                                <input type="number" name="id" class="edit-data" placeholder="Nova ordem">
                            </div>
                            <div class="input-container">
                                <input type="number" name="valor" class="edit-data" placeholder="Novo valor">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button id="submit-edit" class="btn">Alterar</button>
                            <button class="btn back-btn">Cancelar</button>
                        </div>
                    </div>
                    <div class="form-container action-div hidden" id="delete-container">
                        <h2>Deletar Etapa</h2>
                        <div class="pseudo-form">
                            <div class="input-container">
                                <input type="number" name="id" id="delete-id" placeholder="Ordem da Etapa à ser deletada">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button id="submit-delete" class="btn">Deletar</button>
                            <button class="btn back-btn">Cancelar</button>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <footer>
        <h3>Orgulhosamente criado pela turma de Informática 2A de ingresso em 2019 ©</h3>
    </footer>
    <script src="assets/js/main.js"></script>
</body>
</html>
