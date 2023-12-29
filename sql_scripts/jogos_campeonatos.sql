USE campeonato;

/*INSERINDO OS JOGOS*/
INSERT INTO Jogo (id_edicao, id_time_casa, id_time_visitante, dt_jogo)
SELECT
    1 AS id_edicao,
    casa.id AS id_time_casa,
    visitante.id AS id_time_visitante,
    DATE_ADD('2021-01-20', INTERVAL FLOOR(RAND() * DATEDIFF('2021-02-21', '2021-01-20')) DAY) AS dt_jogo
FROM
    (SELECT id FROM Time) casa,
    (SELECT id FROM Time) visitante
WHERE
    casa.id != visitante.id;

/*CONSULTAS */
SELECT * FROM Jogo WHERE id_time_casa = 1 OR id_time_visitante = 1 ORDER BY id_time_casa, id_time_visitante ASC;



/*GERANDO RESULTADOS ALEATÓRIOS PARA OS JOGOS*/
INSERT INTO Resultado(gols_pro, gols_contra, id_jogo,id_time)
SELECT
    FLOOR(RAND() * 5) AS gols_pro,
    FLOOR(RAND() * 5) AS gols_contra,
    jogo.id AS id_jogo,
    time.id AS id_time
FROM
    Jogo jogo
INNER JOIN
    Time time ON time.id = jogo.id_time_casa;

INSERT INTO Resultado(gols_pro, gols_contra, id_jogo,id_time)
SELECT
    FLOOR(RAND() * 5) AS gols_pro,
    FLOOR(RAND() * 5) AS gols_contra,
    jogo.id AS id_jogo,
    time.id AS id_time
FROM
    Jogo jogo
INNER JOIN
    Time time ON time.id = jogo.id_time_visitante;
