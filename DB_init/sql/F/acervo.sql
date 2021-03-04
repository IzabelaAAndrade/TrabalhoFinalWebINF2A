CREATE TABLE IF NOT EXISTS `acervo` (
  `id` int(11) NOT NULL,
  `id_campi` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `tipo` enum('livros','periodicos','academicos','midias') NOT NULL,
  `ano` int(11) NOT NULL,
  `editora` varchar(255) NOT NULL,
  `paginas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;