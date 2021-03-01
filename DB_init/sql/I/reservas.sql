CREATE TABLE IF NOT EXISTS reservas(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_alunos int NOT NULL,
    id_acervo int NOT NULL,
    data_reserva date NOT NULL,
    tempo_espera int NOT NULL,
    emprestou char NOT NULL
);
