CREATE TABLE IF NOT EXISTS turmas(
id INT(11) NOT NULL AUTO_INCREMENT, 
id_cursos INT(11) NOT NULL, 
nome VARCHAR(255) NOT NULL, 
PRIMARY KEY (id)) ENGINE = InnoDB;