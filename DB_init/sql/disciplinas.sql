CREATE TABLE `disciplinas` (
  `id` int(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_turmas` int(8) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `carga_horaria_min` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

