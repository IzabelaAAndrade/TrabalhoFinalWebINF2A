SET time_zone = 'America/Sao_Paulo';

CREATE TABLE IF NOT EXISTS `atividades` (
  `id` int(11) NOT NULL,
  `id_disciplinas` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY(`id`)
);

