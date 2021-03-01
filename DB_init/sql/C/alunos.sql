/*
Id (CPF)
nome
Sexo
Nascimento
Logradouro
Numero
Complemento
Bairro
Cidade
CEP
UF
E-mail
Foto (endereço)
*/

CREATE TABLE IF NOT EXISTS `alunos` (
  `id` VARCHAR(15) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `sexo` VARCHAR(10),
  `nascimento` DATE,
  `logradouro` VARCHAR(15),
  `numero` SMALLINT,
  `complemento` VARCHAR(15),
  `bairro` VARCHAR(15),
  `cidade` VARCHAR(15),
  `cep` VARCHAR(15),
  `uf` VARCHAR(2),
  `email` VARCHAR(50),
  `foto` VARCHAR(255),
  PRIMARY KEY(`id`)
);
