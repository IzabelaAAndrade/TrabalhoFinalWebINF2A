-- Povoa Tabela Alunos -- 
INSERT INTO `alunos` (`id`, `nome`, `email`)  VALUES
(1, 'Delilah Rose', 'gerenciawebinf2a@gmail.com'),
(2, 'Carter Kane', 'gerenciawebinf2a@gmail.com'),
(3, 'Sadie Kane', 'gerenciawebinf2a@gmail.com'),
(4, 'Annabeth Chase', 'gerenciawebinf2a@gmail.com'),
(5, 'Will Herondale', 'gerenciawebinf2a@gmail.com'),
(6, 'Alec Lightwood', 'gerenciawebinf2a@gmail.com'),
(7, 'Isabelle Ligthwood', 'gerenciawebinf2a@gmail.com'),
(8, 'Hazel Levesque', 'gerenciawebinf2a@gmail.com'),
(9, 'Citra Terranova', 'gerenciawebinf2a@gmail.com'),
(10, 'Jace Wayland', 'gerenciawebinf2a@gmail.com');




-- Povoar Tabela Empréstimos --
INSERT INTO `emprestimos` (`Id`, `Id_alunos`, `Id_acervo`, `Data_emprestimo`, `Data_prev_devol`, `Data_devolucao`, `Multa`) VALUES
(1, 1, 1, '2021-04-04', '2021-04-11', '2021-03-22', 0),
(2, 2, 2, '2021-04-04', '2021-04-11', '2021-03-11', 0),
(3, 3, 9, '2021-03-21', '2021-03-21', '2021-03-21', 0),
(4, 6, 3, '2021-03-28', '2021-04-04', '2021-04-04', 0),
(5, 5, 8, '2021-03-28', '2021-04-04', '2021-04-04', 0);