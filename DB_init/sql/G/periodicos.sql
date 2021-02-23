CREATE TABLE IF NOT EXISTS periodicos( 
    id int AUTO_INCREMENT PRIMARY KEY,
    periodicidade ENUM('diario','mensal','anual','indefinido') NOT NULL,
    mes ENUM('jan','feb','mar','abr','mai','jun','jul','ago','sep','out','nov','dez') NOT NULL,
    volume int NOT NULL,
    subtipo ENUM('revista','jornal','boletim') NOT NULL,
    issn VARCHAR(8) NOT NULL
);