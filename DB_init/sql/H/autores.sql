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
