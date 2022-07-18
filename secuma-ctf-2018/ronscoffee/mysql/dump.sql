-- ###################################################3
--      Sql para construir la base de datos
-- ###################################################3

CREATE DATABASE IF NOT EXISTS ronscoffee;

-- CREATE USER IF NOT EXISTS ''@'localhost' IDENTIFIED BY '';
-- GRANT SELECT ON ronscoffee . * TO ''@'localhost';

USE ronscoffee;

CREATE TABLE IF NOT EXISTS `users`(
    `id` INT AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(200) NOT NULL,
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=utf8;


INSERT INTO `users` (email,password) VALUES 
(
    'elcuniao@codetontos.ix','0000021$f26a580d1d278dc6fe82a618005457c7'
),
(
    'elfantoche@codetontos.ix','0000022$d777fb28a1cc30aed783de5237aa80c3'
),
(
    'admin@codetontos.ix','0000023$b32cbddb7b2224cc27785d9fee208773'
),
(
    'cabezamelon@codetontos.ix','0000024$4ee4c310f21e01df4aca08b634d4c276'
),
(
    'elsonrisitas@codetontos.ix','0000025$b5a2f1434c50a95a6ffa609eef4e5d56'
);