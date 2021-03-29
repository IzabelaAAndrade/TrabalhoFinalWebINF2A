<?php
@session_start();
include '../../sistema_login/verifica_login.php';
?>

<header>
    <img src="../img/sidaLogo.jpg" alt="logo" id="logo">
    <h1 id="titulo">Sistema Diário Acadêmico</h1>
    <div id="dados_user">
        <div id="aux">
            <h2 id="nome_user">Olá <?php echo($_SESSION['nome_user']); ?></h2>
            <h2 id="sair"><a href="../../sistema_login/logout.php">Sair</a></h2>
        </div>
    </div> 
</header>
<nav>
    <nav>
        <ul class="menu" >
           <li><a href="../../">Home</a></li>
           <li><a href="#">Sobre</a></li>
           <li><a href="#">Manutenção</a>
               <ul class="sub_menu">
                   <li><a href="../../campi/campi.php">Campi</a></li>
                   <li><a href="../../manutencao_departamentos/departamentos.html">Departamentos</a></li>
                   <li><a href="../../manutenção_cursos/">Cursos</a></li>
                   <li><a href="../../manutancao_turmas/">Turmas</a></li>
                   <li><a href="../../manutencao_alunos/">Alunos</a></li>
                   <li><a href="../../manutencao_professores/">Professores</a></li>
                   <li><a href="../../manutencao_disciplinas/">Disciplinas</a></li>
                   <li><a href="../../manutencao_etapas/">Etapas</a></li>
                   <li><a href="../../manutencao_diarios/">Diários</a></li>
               </ul>
           </li>
           <li><a href="../../menu_relatorios/">Relatórios</a>
               <ul class="sub_menu">
                   <li><a href="../../menu_relatorios/relatorio_certificado/">Certificados</a></li>
                   <li><a href="../../menu_relatorios/relatorio_historico/">Histórico por Aluno e Turma</a></li>
                   <li><a href="../../menu_relatorios/relatorio_alunos/">Relação de Alunos</a></li>
                   <li><a href="../../menu_relatorios/relatorio_relacao_conteudo/">Relação de Conteúdos</a></li>
                   <li><a href="../../menu_relatorios/relatorio_professores/">Relação de Professores</a></li>
               </ul>
           </li>
           </li>
           <li><a href="../transferencia_alunos/">Transferências</a></li>
           <li><a href="#">Ajuda</a></li>
       </ul>
    </nav>
</nav>