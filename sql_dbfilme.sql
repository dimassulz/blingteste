CREATE SCHEMA IF NOT EXISTS dbfilme;
USE dbfilme ;

CREATE TABLE IF NOT EXISTS dbfilme.ator (
  id INT NOT NULL,
  nome VARCHAR(45) NULL,
  PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS dbfilme.diretor (
  id INT NOT NULL,
  nome VARCHAR(45) NULL,
  PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS dbfilme.filme (
  id INT NOT NULL,
  titulo VARCHAR(45) NULL,
  ano YEAR NULL,
  PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS dbfilme.participa (
  id INT NOT NULL,
  idAtor INT NULL,
  idFilme INT NULL,
  PRIMARY KEY (id),
  INDEX IX_ATOR (idAtor ASC),
  INDEX IX_FILME (idFilme ASC),
  CONSTRAINT FK_ATOR_PARTICIPA
    FOREIGN KEY (idAtor)
    REFERENCES dbfilme.ator (id),
  CONSTRAINT FK_ATOR_FILME
    FOREIGN KEY (idFilme)
    REFERENCES dbfilme.filme (id))
;


CREATE TABLE IF NOT EXISTS dbfilme.dirige (
  id INT NOT NULL,
  idDiretor INT NULL,
  idFilme INT NULL,
  PRIMARY KEY (id),
  INDEX IX_DIRETOR (idDiretor ASC),
  INDEX IX_FILME (idFilme ASC),
  CONSTRAINT FK_DIRETOR_FILME
    FOREIGN KEY (idFilme)
    REFERENCES dbfilme.filme (id),
  CONSTRAINT FK_FILME_DIRETOR
    FOREIGN KEY (idDiretor)
    REFERENCES dbfilme.diretor (id))
;


/*
a. Atores do filme com título “XYZ”.
b. Filmes que o ator de nome “FULANO” participou.
c. Listar os filmes do ano 2015 ordenados pela quantidade de atores participantes e pelo
título em ordem alfabética.
d. Listar os atores que trabalharam em filmes cujo diretor foi “SPIELBERG”.
*/

-- a
SELECT a.nome
FROM dbfilme.filme f
INNER JOIN dbfilme.participa p ON f.id = p.id
INNER JOIN dbfilme.ator a ON a.id = p.id
WHERE f.titulo = 'XYZ'
;

-- b
SELECT f.titulo
FROM dbfilme.filme f
INNER JOIN dbfilme.participa p ON f.id = p.id
INNER JOIN dbfilme.ator a ON a.id = p.id
WHERE f.ano = 2015
;
-- c
SELECT count(p.idAtor) qtAtor, f.titulo
FROM dbfilme.filme f
INNER JOIN dbfilme.participa p ON f.id = p.id
INNER JOIN dbfilme.ator a ON a.id = p.id
WHERE a.nome = 'FULANO'
GROUP BY f.titulo
ORDER BY f.titulo ASC
;

-- d
SELECT a.nome
FROM dbfilme.filme f
INNER JOIN dbfilme.dirige d ON f.id = d.id
INNER JOIN dbfilme.diretor dir ON dir.id = d.id
INNER JOIN dbfilme.participa p ON f.id = p.id
INNER JOIN dbfilme.ator a ON a.id = p.id
WHERE dir.nome = "SPIELBERG"
;