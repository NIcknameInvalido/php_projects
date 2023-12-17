CREATE DATABASE IF NOT EXISTS campeonato;
USE campeonato;


DROP TABLE IF EXISTS Contrato;
DROP TABLE IF EXISTS Jogador;
DROP TABLE IF EXISTS Time;



CREATE TABLE IF NOT EXISTS Jogador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    apelido VARCHAR(50),
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

INSERT INTO Jogador (nome, cpf, apelido, dt_nascimento) VALUES
('Ronaldo Miranda', '58463588800','ronaldinho','1980-08-12'),
#('Neymar Jr', '12345678901','neymarjr','1992-02-05'),
#('Lionel Messi', '98765432109','leomessi','1987-06-24'),
#('Cristiano Ronaldo', '45678901234','cristiano7','1985-02-05'),
#('Kylian Mbappé', '32109876543','k.mbappe','1998-12-20'),
#('Kevin De Bruyne', '56789012345','debruyne','1991-06-28'),
#('Sergio Ramos', '89012345678','sr4','1986-03-30'),
#('Robert Lewandowski', '23456789012','rl9','1988-08-21'),
#('Mohamed Salah', '67890123456','mosalah','1992-06-15'),
#('Gareth Bale', '90123456789','garethb11','1989-07-16'),
#('Eden Hazard', '34567890123','hazard10','1991-01-07');

SELECT nome, sobrenome, apelido, YEAR(NOW()) - YEAR(dt_nascimento) AS Idade FROM Jogador;