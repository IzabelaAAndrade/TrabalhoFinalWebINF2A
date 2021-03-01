CREATE TABLE `matriculas` (
  `id` int(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_alunos` int(8) NOT NULL,
  `id_disciplinas` int(8) NOT NULL,
  `ano` char(4) NOT NULL,
  `ativo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;