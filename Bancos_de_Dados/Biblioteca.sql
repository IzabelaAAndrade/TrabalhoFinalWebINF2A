-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Mar-2021 às 03:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `academicos`
--

CREATE TABLE `academicos` (
  `id_obra` int(11) NOT NULL,
  `id_acervo` int(11) NOT NULL,
  `programa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acervo`
--

CREATE TABLE `acervo` (
  `id` int(11) NOT NULL,
  `id_campi` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `tipo` enum('livros','periodicos','academicos','midias') NOT NULL,
  `ano` int(11) NOT NULL,
  `editora` varchar(255) NOT NULL,
  `paginas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` varchar(15) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_obra` int(4) UNSIGNED NOT NULL,
  `id_autor` int(4) UNSIGNED NOT NULL,
  `nomes` varchar(40) NOT NULL,
  `sobrenomes` varchar(40) NOT NULL,
  `ordem` varchar(20) NOT NULL,
  `qualificacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descartes`
--

CREATE TABLE `descartes` (
  `id_acervo` int(11) NOT NULL,
  `data_descarte` date NOT NULL,
  `motivos` varchar(200) NOT NULL,
  `operador` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(4) UNSIGNED NOT NULL,
  `id_alunos` int(4) UNSIGNED NOT NULL,
  `id_acervo` int(4) UNSIGNED NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_prev_devol` date NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  `multa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_obra` int(11) NOT NULL,
  `id_acervo` int(11) NOT NULL,
  `edicao` varchar(200) NOT NULL,
  `isbn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `midias`
--

CREATE TABLE `midias` (
  `id_obra` int(11) NOT NULL,
  `id_acervo` int(11) NOT NULL,
  `tempo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subtipo` enum('CD','DVD','Fita','PenDrive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partes`
--

CREATE TABLE `partes` (
  `id` int(4) UNSIGNED NOT NULL,
  `id_periodicos` int(4) UNSIGNED NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `pag_inicio` int(4) NOT NULL,
  `pag_final` int(4) NOT NULL,
  `palavras_chave` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodicos`
--

CREATE TABLE `periodicos` (
  `id` int(11) NOT NULL,
  `periodicidade` enum('diario','mensal','anual','indefinido') NOT NULL,
  `mes` enum('jan','feb','mar','abr','mai','jun','jul','ago','sep','out','nov','dez') NOT NULL,
  `volume` int(11) NOT NULL,
  `subtipo` enum('revista','jornal','boletim') NOT NULL,
  `issn` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_alunos` int(11) NOT NULL,
  `id_acervo` int(11) NOT NULL,
  `data_reserva` date NOT NULL,
  `tempo_espera` int(11) NOT NULL,
  `emprestou` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`Id_autor`);

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `partes`
--
ALTER TABLE `partes`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `periodicos`
--
ALTER TABLE `periodicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autores`
--
ALTER TABLE `autores`
  MODIFY `Id_autor` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `Id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `partes`
--
ALTER TABLE `partes`
  MODIFY `Id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `periodicos`
--
ALTER TABLE `periodicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
