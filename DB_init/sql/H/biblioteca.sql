CREATE TABLE IF NOT EXISTS emprestimos(
    data_de_emprestimo date NOT NULL ,
    data_de_devolucao date NOT NULL ,
    id_livro int(4) UNSIGNED NOT NULL
);
CREATE TABLE IF NOT EXISTS autores(
    id_livro int(4) NOT NULL ,
    nomes varchar(30) NOT NULL ,
    sobrenome varchar(20) NOT NULL,
    KEY(id_livro)
);
CREATE TABLE IF NOT EXISTS partes(
    id int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    titulo varchar(40) NOT NULL,
    autor varchar(50) NOT NULL,
    lancamento date NOT NULL,
    PRIMARY KEY(id)
);