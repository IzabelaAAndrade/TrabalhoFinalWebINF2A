USE academico;
DROP TABLE IF EXISTS professores;
CREATE TABLE IF NOT EXISTS `professores` (
  `id` varchar(7) NOT NULL PRIMARY KEY,
  `id_depto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `titulacao` ENUM('M', 'D', 'E', 'G') NOT NULL
);
INSERT INTO professores(id, id_depto, nome, titulacao) VALUES
('0000001', 10, 'Célia', 'D'), 
('0000003', 10, 'Rafael', 'G'),
('0000004', 6, 'Pedro', 'M'), 
('0000005', 10, 'Júlio', 'G'), 
('0000006', 4, 'Enrique', 'M'), 
('0000007', 3, 'Abacate', 'G'), 
('0000042', 10, 'Mortas', 'D');
