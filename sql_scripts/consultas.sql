USE campeonato;
SELECT Campeonato.nome, Edicao.ano_edicao, Edicao.dt_inicio, Edicao.dt_fim, Edicao.id_campeonato FROM Campeonato, Edicao WHERE Campeonato.id = Edicao.id_campeonato;

SELECT Campeonato.nome,Edicao.id,Edicao.ano_edicao,Edicao.dt_inicio,Edicao.dt_fim,Edicao.id_campeonato FROM Campeonato INNER JOIN Edicao ON Campeonato.id=Edicao.id_campeonato WHERE Edicao.id = 2;

SELECT * from Resultado WHERE id_time = 1;

SELECT * FROM Jogo ORDER BY id_time_casa, id_time_visitante ASC;

SELECT * FROM Edicao;

SELECT * FROM Time;

SELECT j.id_time_casa, j.id_time_visitante, r.id_jogo, r.gols_pro, r.gols_contra, 
(SELECT COUNT(*) FROM Resultado as re WHERE re.id_time = 1 AND gols_pro > gols_contra) as 'Vitórias',
(SELECT COUNT(*) FROM Resultado as re WHERE re.id_time = 1 AND gols_pro < gols_contra) as 'Derrotas',
(SELECT COUNT(*) FROM Resultado as re WHERE re.id_time = 1 AND gols_pro = gols_contra) as 'Empates'
FROM Resultado as r 
INNER  JOIN Jogo as j ON r.id_jogo = j.id 
WHERE id_jogo IN (SELECT id FROM Jogo WHERE Jogo.id_time_casa = 1 or Jogo.id_time_visitante = 1);




SELECT t.id,t.nome,
	((SELECT COUNT(*) FROM Resultado as re WHERE re.id_time = t.id AND gols_pro > gols_contra) * 3) + (SELECT COUNT(*) FROM Resultado as re WHERE re.id_time  = t.id AND gols_pro = gols_contra) AS 'Pontos',
	(SELECT COUNT(*) FROM Resultado as re WHERE re.id_time = t.id AND gols_pro > gols_contra) AS 'Vitórias', 
	(SELECT COUNT(*) FROM Resultado as re WHERE re.id_time  = t.id AND gols_pro = gols_contra) AS 'Empates',
    (SELECT COUNT(*) FROM Resultado as re WHERE re.id_time  = t.id AND gols_pro < gols_contra) AS 'Derrotas'
FROM Resultado as r INNER JOIN Time as t ON t.id = r.id_time GROUP BY t.nome, t.id;




