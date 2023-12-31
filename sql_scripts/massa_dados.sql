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


INSERT INTO Campeonato (nome) VALUES ('planaltina_cup');
INSERT INTO Edicao (ano_edicao,dt_inicio, dt_fim, id_campeonato) VALUES (2021, '2021-01-20', '2021-02-21', 1);




INSERT INTO Jogo (id_edicao, id_time_visitante, id_time_casa, dt_jogo)
VALUES (1,1,2,'2021-01-20');


SELECT tj1.sobrenome, t1.nome, c.nome, j.dt_jogo, CASE WHEN j.id_time_casa IS NOT NULL THEN 'Casa' ELSE 'Visitante' END AS Tipo
FROM Edicao as e INNER JOIN Campeonato AS c ON c.id = e.id_campeonato
INNER JOIN Jogo as j ON e.id = j.id_edicao
INNER JOIN Time as t1 ON t1.id = j.id_time_casa
INNER JOIN Contrato as c1 ON t1.id = c1.id_time
INNER JOIN Jogador as tj1 ON tj1.id = c1.id_jogador
UNION
SELECT tj2.sobrenome, t2.nome, c.nome, j.dt_jogo, CASE WHEN j.id_time_visitante IS NOT NULL THEN 'Visitante' ELSE 'Casa' END AS Tipo
FROM Edicao as e INNER JOIN Campeonato AS c ON c.id = e.id_campeonato
INNER JOIN Jogo as j ON e.id = j.id_edicao
INNER JOIN Time as t2 ON t2.id = j.id_time_visitante
INNER JOIN Contrato as c2 ON t2.id = c2.id_time
INNER JOIN Jogador as tj2 ON tj2.id = c2.id_jogador;


SELECT 
    CASE WHEN j.id_time_casa IS NOT NULL THEN tj_casa.sobrenome ELSE tj_visitante.sobrenome END AS sobrenome_jogador,
    CASE WHEN j.id_time_casa IS NOT NULL THEN t1.nome ELSE t2.nome END AS nome_time,
    c.nome AS nome_campeonato,
    j.dt_jogo,
    CASE WHEN j.id_time_casa IS NOT NULL THEN 'Casa' ELSE 'Visitante' END AS tipo_time
FROM
    Edicao AS e
    INNER JOIN Campeonato AS c ON c.id = e.id_campeonato
    INNER JOIN Jogo AS j ON e.id = j.id_edicao
    LEFT JOIN Contrato AS c1 ON j.id_time_casa = c1.id_time
    LEFT JOIN Time AS t1 ON t1.id = c1.id_time
    LEFT JOIN Jogador AS tj_casa ON tj_casa.id = c1.id_jogador
    LEFT JOIN Contrato AS c2 ON j.id_time_visitante = c2.id_time
    LEFT JOIN Time AS t2 ON t2.id = c2.id_time
    LEFT JOIN Jogador AS tj_visitante ON tj_visitante.id = c2.id_jogador;



SELECT j.nome, t.nome, c.dt_inicio FROM Contrato as c INNER JOIN Jogador AS j ON c.id_jogador = j.id INNER JOIN Time AS t ON c.id_time = t.id;
SELECT * FROM Edicao;
SELECT * FROM Campeonato

/* SELECT SIMPLES PARA AS TABELAS
SELECT * FROM Jogador;
SELECT * FROM Time;
SELECT * FROM Contrato;
SELECT * FROM Campeonato;

SELECT * FROM Jogo;
SELECT c.nome, e.dt_inicio, e.dt_fim FROM Campeonato as c INNER JOIN Edicao as e ON c.id = e.id_campeonato;
SELECT j.nome, t.nome, c.dt_inicio FROM Contrato as c INNER JOIN Jogador AS j ON c.id_jogador = j.id INNER JOIN Time AS t ON c.id_time = t.id; */

