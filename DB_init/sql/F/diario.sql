--Tabela diario, bd Diario

CREATE TABLE IF NOT EXISTS `diario` (
  `id_conteudos` int(11) NOT NULL,
  `id_matriculas` int(11) NOT NULL,
  `id_atividades` int(11) NOT NULL,
  `faltas` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
