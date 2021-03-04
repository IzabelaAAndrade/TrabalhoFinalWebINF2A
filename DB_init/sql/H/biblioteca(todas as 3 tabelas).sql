DROP TABLE IF EXISTS emprestimos;
CREATE TABLE IF NOT EXISTS emprestimos(
    Id int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    Id_alunos int(4) UNSIGNED NOT NULL,
    Id_acervo int(4) UNSIGNED NOT NULL,
    Data_reserva DATE NOT NULL,
    Data_emprestimo DATE NOT NULL,
    Data_prev_devol DATE NOT NULL ,
    Data_devolucao DATE,
    Multa double,
    PRIMARY KEY (Id)
);
DROP TABLE IF EXISTS autores;
CREATE TABLE IF NOT EXISTS autores(
    Id_obra int(4) UNSIGNED NOT NULL ,
    Id_autor int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    Nomes varchar(40) NOT NULL,
    Sobrenomes varchar(40) NOT NULL,
    Ordem varchar(20) NOT NULL ,
    Qualificacao varchar(20) NOT NULL,
    PRIMARY KEY(Id_autor)
);
DROP TABLE IF EXISTS partes;
CREATE TABLE IF NOT EXISTS partes(
    Id int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    Id_periodicos int(4) UNSIGNED NOT NULL,
    Titulo varchar(40) NOT NULL,
    Pag_inicio int(4) NOT NULL,
    Pag_final  int(4) NOT NULL,
    Palavras_chave varchar(20),
    PRIMARY KEY(Id)
);
