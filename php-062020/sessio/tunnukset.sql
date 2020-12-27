
DROP DATABASE IF EXISTS tunnukset;
CREATE DATABASE tunnukset DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE tunnukset;
DROP TABLE IF EXISTS tunnustaulukko;
CREATE TABLE tunnustaulukko (
  id int(10) auto_increment,
  tunnus text NOT NULL, 
  salasana text NOT NULL,
  PRIMARY KEY  (id)
);
-- taulun tunnustaulukko tiedot
INSERT INTO tunnustaulukko (tunnus, salasana);

 