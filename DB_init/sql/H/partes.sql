
CREATE TABLE IF NOT EXISTS partes(
    Id int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    Id_periodicos int(4) UNSIGNED NOT NULL,
    Titulo varchar(40) NOT NULL,
    Pag_inicio int(4) NOT NULL,
    Pag_final  int(4) NOT NULL,
    Palavras_chave varchar(20),
    PRIMARY KEY(Id)
);
