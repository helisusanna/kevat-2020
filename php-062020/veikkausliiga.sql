DROP DATABASE IF EXISTS veikkausliiga;
CREATE DATABASE veikkausliiga DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE veikkausliiga;
DROP TABLE IF EXISTS sarjataulukko;
CREATE TABLE sarjataulukko (
  id int(10) auto_increment,
  joukkue text NOT NULL, 
  ottelut int,
  voitot int,
  tasapelit int,
  tappiot int,
  PRIMARY KEY  (id)
);
-- taulun sarjataulukko tiedot
INSERT INTO sarjataulukko (joukkue, ottelut, voitot, tasapelit, tappiot) 
VALUES  ('HJK',33,23,7,3),
('KuPS',33,16,8,9),
('Ilves',33,15,11,7),
('FC Lahti',33,12,13,8);

 