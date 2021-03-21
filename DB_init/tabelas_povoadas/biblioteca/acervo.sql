-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Mar-2021 às 22:51
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
  `paginas` int(11) NOT NULL,
  CONSTRAINT fk_id_acervo FOREIGN KEY (id_acervo) REFERENCES livros (id_livros)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acervo`
--

INSERT INTO `acervo` (`id`, `id_campi`, `nome`, `local`, `tipo`, `ano`, `editora`, `paginas`) VALUES
(1, 1, 'Homem de Giz', 'Rio de Janeiro', 'livros', 2018, 'Intrínseca', 272),
(2, 1, 'O Que Aconteceu com Annie', 'Rio de Janeiro', 'livros', 2019, 'Intrínseca', 288),
(3, 1, 'As Outras Pessoas', 'Rio de Janeiro', 'livros', 2020, 'Intrínseca', 304),
(4, 2, 'O Ceifador', 'São Paulo', 'livros', 2017, 'Seguinte', 448),
(5, 2, 'A Nuvem', 'São Paulo', 'livros', 2018, 'Seguinte', 496),
(6, 4, 'A Passagem', 'São Paulo', 'livros', 2016, 'Arqueiro', 816),
(7, 3, 'Os Doze', 'São Paulo', 'livros', 2013, 'Arqueiro', 592),
(8, 3, 'A Cidade dos Espelhos', 'São Paulo', 'livros', 2016, 'Arqueiro', 592),
(9, 4, 'Cidade dos Ossos', 'Rio de Janeiro', 'livros', 2013, 'Galera Record', 462),
(10, 4, 'Cidade das Cinzas', 'Rio de Janeiro', 'livros', 2013, 'Galera Record', 444);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acervo`
--
ALTER TABLE `acervo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
