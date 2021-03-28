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


-- Povoar Tabela Acervo -- 
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


-- Povoar Tabela Empréstimos --
INSERT INTO `emprestimos` (`Id`, `Id_alunos`, `Id_acervo`, `Data_emprestimo`, `Data_prev_devol`, `Data_devolucao`, `Multa`) VALUES
(1, 1, 1, '2021-04-04', '2021-04-11', '2021-03-22', 0),
(2, 2, 2, '2021-04-04', '2021-04-11', '2021-03-11', 0),
(3, 3, 9, '2021-03-21', '2021-03-21', '2021-03-21', 0),
(4, 6, 3, '2021-03-28', '2021-04-04', '2021-04-04', 0),
(5, 5, 8, '2021-03-28', '2021-04-04', '2021-04-04', 0);