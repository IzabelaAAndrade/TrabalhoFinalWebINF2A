CREATE TABLE `conteudos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_etapas` int(11) NOT NULL,
  `id_disciplinas` int(11) NOT NULL,
  `conteudos` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `datas` varchar(255) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;
