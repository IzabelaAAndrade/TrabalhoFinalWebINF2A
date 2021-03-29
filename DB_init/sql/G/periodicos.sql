CREATE TABLE IF NOT EXISTS periodicos( 
    id int AUTO_INCREMENT PRIMARY KEY,
    id_acervo int NOT NULL,
    periodicidade ENUM('diario','mensal','anual','indefinido') NOT NULL,
    mes ENUM('jan','fev','mar','abr','mai','jun','jul','ago','set','out','nov','dez') NOT NULL,
    volume int NOT NULL,
    subtipo ENUM('revista','jornal','boletim') NOT NULL,
    issn VARCHAR(8) NOT NULL
);
