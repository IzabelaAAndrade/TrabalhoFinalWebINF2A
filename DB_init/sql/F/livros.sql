--Tabela livros, bd Biblioteca

CREATE TABLE IF NOT EXISTS `livros` (
  `id_obra` int(11) NOT NULL,
  `id_acervo` int(11) NOT NULL,
  `edicao` varchar(200) NOT NULL,
  `isbn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
