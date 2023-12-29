CREATE DATABASE IF NOT EXISTS campeonato;
USE campeonato;

-- Drop Resultado
DROP TABLE IF EXISTS Resultado;
-- Drop Jogo
DROP TABLE IF EXISTS Jogo;
-- Drop Edicao
DROP TABLE IF EXISTS Edicao;
-- Drop Campeonato
DROP TABLE IF EXISTS Campeonato;
-- Drop Contrato
DROP TABLE IF EXISTS Contrato;
-- Drop Jogador
DROP TABLE IF EXISTS Jogador;
-- Drop Time
DROP TABLE IF EXISTS Time;



CREATE TABLE IF NOT EXISTS Jogador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    dt_nascimento DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS Time  (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sigla VARCHAR(11) NOT NULL UNIQUE,
    ano_fundacao INT NOT NULL
);

CREATE TABLE IF NOT EXISTS  Contrato (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_inicio DATE NOT NULL,
    dt_fim DATE,
    id_jogador INT,
    id_time INT,
    FOREIGN KEY (id_jogador) REFERENCES Jogador(id),
    FOREIGN KEY (id_time) REFERENCES Time(id)
);

CREATE TABLE IF NOT EXISTS Campeonato (
    id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    nome VARCHAR(45) NOT NULL
);

CREATE TABLE IF NOT EXISTS Edicao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ano_edicao VARCHAR(45) NOT NULL,
    dt_inicio DATE NOT NULL,
    dt_fim DATE NOT NULL,
    id_campeonato INT NOT NULL,
    FOREIGN KEY (id_campeonato) REFERENCES Campeonato(id)
);

CREATE TABLE IF NOT EXISTS Jogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_edicao INT NOT NULL,
    id_time_casa INT NOT NULL,
    id_time_visitante INT NOT NULL,
    dt_jogo DATE NOT NULL,
    FOREIGN KEY (id_edicao) REFERENCES Edicao(id),
    FOREIGN KEY (id_time_visitante) REFERENCES Time(id),
    FOREIGN KEY (id_time_casa) REFERENCES Time(id)
);

CREATE TABLE IF NOT EXISTS Resultado (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    gols_pro INT NOT NULL,
    gols_contra INT NOT NULL,
    id_jogo INT NOT NULL,
    id_time INT NOT NULL,
    FOREIGN KEY (id_jogo) REFERENCES Jogo(id),
    FOREIGN KEY (id_time) REFERENCES Time(id)
);

USE campeonato;

#massa de dados para testes

INSERT INTO Jogador (nome, sobrenome, cpf, dt_nascimento) VALUES
	('Eduardo', 'Oliveira', '78901234567', '1990-10-15'),
	('Gustavo', 'Machado', '87654321098', '1987-07-22'),
	('Henrique', 'Ribeiro', '23456789012', '1998-05-30'),
	('Anderson', 'Pereira', '34567890123', '1983-12-08'),
	('Pedro', 'Sousa', '45678901234', '1991-03-17'),
	('Bruno', 'Costa', '56789012345', '1989-09-24'),
	('Fábio', 'Almeida', '67890123456', '1997-01-04'),
	('Marcelo', 'Lima', '78901234568', '1986-06-11'),
	('Roberto', 'Santana', '89012345678', '1993-08-20'),
	('Miguel', 'Rodrigues', '90123456789', '1984-04-03'),
    ('Ronaldo', 'Miranda', '58463588800','1980-08-12'),
    ('Mateus', 'Silva', '58463588801','1980-08-12');

INSERT INTO Time (nome, sigla, ano_fundacao) VALUES 
	('Magnus Futsal', 'MFS', '2009'),
	('Joinville Futsal', 'JFS', '1999'),
	('Carlos Barbosa Futsal', 'CBF', '1976'),
	('Krona Futsal', 'KFS', '2000'),
	('Minas Tênis Clube Futsal', 'MTCF', '1935'),
	('Atlântico Erechim Futsal', 'AEF', '1995'),
	('Cascavel Futsal', 'CFS', '1996'),
	('Pato Futsal', 'PFS', '2001'),
	('Blumenau Futsal', 'BFS', '2000'),
	('Sorocaba Futsal', 'SFS', '2000'),
	('Assoeva Futsal', 'AFS', '1983'),
	('Campo Mourão Futsal', 'CMFS', '1995');

INSERT INTO Contrato (dt_inicio, dt_fim, id_jogador, id_time) VALUES
('2023-01-15', NULL, 1, 1),
('2023-02-10', NULL, 2, 1),
('2023-03-05', NULL, 3, 1),
('2023-04-20', NULL, 4, 1),
('2023-05-18', NULL, 5, 1),
('2023-06-12', NULL, 6, 1),
('2023-07-08', NULL, 7, 2),
('2023-08-03', NULL, 8, 2),
('2023-09-21', NULL, 9, 2),
('2023-10-14', NULL, 10, 2),
('2023-11-09', NULL, 11, 2),
('2023-12-02', NULL, 12, 2);


INSERT INTO Campeonato (nome) VALUES ('Planaltina Cup');
INSERT INTO Edicao (ano_edicao,dt_inicio, dt_fim, id_campeonato) VALUES (2021, '2021-01-20', '2021-02-21', 1);
INSERT INTO Edicao (ano_edicao,dt_inicio, dt_fim, id_campeonato) VALUES (2022, '2022-01-20', '2022-02-21', 1);


/*INSERT INTO Jogo (id_edicao, id_time_visitante, id_time_casa, dt_jogo)
VALUES (1,1,2,'2021-01-20');