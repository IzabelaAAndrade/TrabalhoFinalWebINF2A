# Descição dos DBs

* se quiserem, colem aqui a descrição das tabelas e dos dbs
* elas podem ser obtidas com os comandos `describe` e `list tables`
* talvez seja legal também adicionar alguns comentários sobre decisões polêmicas
* o objetivo disso é facilitar a integração e correção de erros

## DB biblioteca

    +----------------------+
    | Tables_in_biblioteca |
    +----------------------+
    | academicos           |
    | midias               |
    | periodicos           |
    | acervo               |
    | livros               |
    +----------------------+

## academicos

    +-----------+-------------+------+-----+---------+-------+
    | Field     | Type        | Null | Key | Default | Extra |
    +-----------+-------------+------+-----+---------+-------+
    | id_obra   | int         | NO   |     | NULL    |       |
    | id_acervo | int         | NO   |     | NULL    |       |
    | programa  | varchar(30) | NO   |     | NULL    |       |
    +-----------+-------------+------+-----+---------+-------+

não sei o que é programa, mas deve ser uma string

## midias

    +-----------+------------------------------------+------+-----+---------+-------+
    | Field     | Type                               | Null | Key | Default | Extra |
    +-----------+------------------------------------+------+-----+---------+-------+
    | id_obra   | int                                | NO   |     | NULL    |       |
    | id_acervo | int                                | NO   |     | NULL    |       |
    | tempo     | timestamp                          | NO   |     | NULL    |       |
    | subtipo   | enum('CD','DVD','Fita','PenDrive') | NO   |     | NULL    |       |
    +-----------+------------------------------------+------+-----+---------+-------+

## periodicos

    +---------------+-------------------------------------------------------------------------------+------+-----+---------+----------------+
    | Field         | Type                                                                          | Null | Key | Default | Extra          |
    +---------------+-------------------------------------------------------------------------------+------+-----+---------+----------------+
    | id            | int                                                                           | NO   | PRI | NULL    | auto_increment |
    | periodicidade | enum('diario','mensal','anual','indefinido')                                  | NO   |     | NULL    |                |
    | mes           | enum('jan','feb','mar','abr','mai','jun','jul','ago','sep','out','nov','dez') | NO   |     | NULL    |                |
    | volume        | int                                                                           | NO   |     | NULL    |                |
    | subtipo       | enum('revista','jornal','boletim')                                            | NO   |     | NULL    |                |
    | issn          | varchar(8)                                                                    | NO   |     | NULL    |                |
    +---------------+-------------------------------------------------------------------------------+------+-----+---------+----------------+

apesar de ser um número, issn está sendo representado como varchar para evitar problemas com zeros à esquerda (se tiver uma solução melhor, falem, por favor)

## acervo

    +-----------+-----------------------------------------------------+------+-----+---------+----------------+
    | Field    | Type                                                 | Null | Key | Default | Extra          |
    +-----------+-----------------------------------------------------+------+-----+---------+----------------+
    | id       | int                                                  | NO   | PRI | NULL    | auto_increment |
    | id_campi | int                                                  | NO   |     | NULL    |                |
    | nome     | varchar(255)                                         | NO   |     | NULL    |                |
    | tipo     | enum('livros', 'periodicos', 'academicos', 'midias') | NO   |     | NULL    |                |
    | local    | varchar(255)                                         | NO   |     | NULL    |                |
    | ano      | int                                                  | NO   |     | NULL    |                |
    | editora  | varchar(255)                                         | NO   |     | NULL    |                |
    | paginas  | int                                                  | NO   |     | NULL    |                |
    +-----------+-----------------------------------------------------+------+-----+---------+----------------+

## livros

    +-----------+--------------+------+-----+---------+-------+
    | Field     | Type         | Null | Key | Default | Extra |
    +-----------+--------------+------+-----+---------+-------+
    | id_obra   | int          | NO   |     | NULL    |       |
    | id_acervo | int          | NO   |     | NULL    |       |
    | edicao    | varchar(200) | NO   |     | NULL    |       |
    | isbn      | varchar(200) | NO   |     | NULL    |       |
    +-----------+--------------+------+-----+---------+-------+


## DB diario

    +----------------------+
    | Tables_in_diario     |
    +----------------------+
    | diario               |
    +----------------------+

## diario

    +--------- -----+---------+------+-----+---------+-------+
    | Field         | Type    | Null | Key | Default | Extra |
    +---------- ----+---------+------+-----+---------+-------+
    | id_conteudos  | int(11) | NO   |     | NULL    |       |
    | id_matriculas | int(11) | NO   |     | NULL    |       |
    | id_atividades | int(11) | NO   |     | NULL    |       |
    | faltas        | int(11) | NO   |     | NULL    |       |
    | nota          | int(11) | NO   |     | NULL    |       |
    +---------- ----+---------+------+-----+---------+-------+  
