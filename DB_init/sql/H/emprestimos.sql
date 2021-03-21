
CREATE TABLE IF NOT EXISTS emprestimos(
    Id int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    Id_alunos int(4) UNSIGNED NOT NULL,
    Id_acervo int(4) UNSIGNED NOT NULL,
    Data_emprestimo DATE NOT NULL,
    Data_prev_devol DATE NOT NULL ,
    Data_devolucao DATE,
    Multa double,
    PRIMARY KEY (Id)
);
