/*
id: número SIAPE do professor
id_depto: número do departamento do professor
nome: nome do professor
titulacao:
  D -> Doutorado,
  M -> Mestrado,
  E -> Especialização,
  G -> Graduação
*/

CREATE TABLE IF NOT EXISTS `professores` (
  `id` varchar(7) NOT NULL,
  `id_depto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `titulacao` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
);