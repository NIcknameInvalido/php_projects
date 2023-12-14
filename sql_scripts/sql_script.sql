-- CREATE SCHEMA cpn;
-- GO;

-- CREATE TABLE cpn.Jogador(
-- 	id INT PRIMARY KEY NOT NULL IDENTITY(1,1),
-- 	nome VARCHAR(100) NOT NULL,
-- 	cpf VARCHAR (11) NOT NULL UNIQUE,
-- 	apelido VARCHAR(50),
-- 	idade INT NOT NULL,
-- 	dt_nascimento DATE NOT NULL,
-- )
-- GO

-- CREATE TABLE cpn.Time (
-- 	id INT PRIMARY KEY NOT NULL,
-- 	nome VARCHAR(100) NOT NULL,
-- 	sigla VARCHAR (11) NOT NULL UNIQUE,
-- 	ano_fundancao INT NOT NULL
-- )
-- GO

-- CREATE TABLE cpn.Contrato(
-- 	id INT PRIMARY KEY NOT NULL,
-- 	dt_inicio DATE NOT NULL,
-- 	dt_fim DATE,
-- 	id_jogador INT FOREIGN KEY REFERENCES cpn.Jogador(id),
-- 	id_time INT FOREIGN KEY REFERENCES cpn.Time(id)
-- )
-- GO


-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Ronaldo Miranda', '58463588800','ronaldinho',20,'1980-08-12')
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Neymar Jr', '12345678901','neymarjr',29,'1992-02-05');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Lionel Messi', '98765432109','leomessi',34,'1987-06-24');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Cristiano Ronaldo', '45678901234','cristiano7',37,'1985-02-05');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Kylian Mbapp�', '32109876543','k.mbappe',23,'1998-12-20');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Kevin De Bruyne', '56789012345','debruyne',30,'1991-06-28');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Sergio Ramos', '89012345678','sr4',36,'1986-03-30');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Robert Lewandowski', '23456789012','rl9',33,'1988-08-21');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Mohamed Salah', '67890123456','mosalah',29,'1992-06-15');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Gareth Bale', '90123456789','garethb11',33,'1989-07-16');
-- INSERT INTO cpn.Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES('Eden Hazard', '34567890123','hazard10',31,'1991-01-07');
-- GO


-- SELECT nome, apelido, YEAR(GETDATE()) - YEAR(dt_nascimento) as "Idade"  FROM cpn.Jogador;

--MYSQL
USE `campeonato`;

CREATE TABLE Jogador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    apelido VARCHAR(50),
    idade INT NOT NULL,
    dt_nascimento DATE NOT NULL
);

CREATE TABLE Time (
    id INT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sigla VARCHAR(11) NOT NULL UNIQUE,
    ano_fundacao INT NOT NULL
);

CREATE TABLE Contrato (
    id INT PRIMARY KEY,
    dt_inicio DATE NOT NULL,
    dt_fim DATE,
    id_jogador INT,
    id_time INT,
    FOREIGN KEY (id_jogador) REFERENCES Jogador(id),
    FOREIGN KEY (id_time) REFERENCES Time(id)
);

INSERT INTO Jogador (nome, cpf, apelido, idade, dt_nascimento) VALUES
('Ronaldo Miranda', '58463588800','ronaldinho',20,'1980-08-12'),
('Neymar Jr', '12345678901','neymarjr',29,'1992-02-05'),
('Lionel Messi', '98765432109','leomessi',34,'1987-06-24'),
('Cristiano Ronaldo', '45678901234','cristiano7',37,'1985-02-05'),
('Kylian Mbappé', '32109876543','k.mbappe',23,'1998-12-20'),
('Kevin De Bruyne', '56789012345','debruyne',30,'1991-06-28'),
('Sergio Ramos', '89012345678','sr4',36,'1986-03-30'),
('Robert Lewandowski', '23456789012','rl9',33,'1988-08-21'),
('Mohamed Salah', '67890123456','mosalah',29,'1992-06-15'),
('Gareth Bale', '90123456789','garethb11',33,'1989-07-16'),
('Eden Hazard', '34567890123','hazard10',31,'1991-01-07');

SELECT nome, apelido, YEAR(NOW()) - YEAR(dt_nascimento) AS Idade FROM Jogador;