CREATE TABLE IF NOT EXISTS midias( 
    id_obra int NOT NULL,
    id_acervo int NOT NULL,
    tempo timestamp NOT NULL,
    subtipo ENUM('CD','DVD','Fita','PenDrive') NOT NULL
);