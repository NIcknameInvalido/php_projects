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
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL
);

CREATE TABLE IF NOT EXISTS Edicao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ano_edicao VARCHAR(45) NOT NULL,
    dt_inicio DATE NOT NULL,
    dt_Fim DATE NOT NULL,
    id_campeonato INT NOT NULL,
    FOREIGN KEY (id_campeonato) REFERENCES Campeonato(id)
);

CREATE TABLE IF NOT EXISTS Jogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_edicao INT NOT NULL,
    id_time_visitante INT NOT NULL,
    id_time_casa INT NOT NULL,
    dt_jogo DATE NOT NULL,
    FOREIGN KEY (id_edicao) REFERENCES Edicao(id),
    FOREIGN KEY (id_time_visitante) REFERENCES Time(id),
    FOREIGN KEY (id_time_casa) REFERENCES Time(id)
);

CREATE TABLE IF NOT EXISTS Resultado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gols_time_casa INT NOT NULL,
    gols_time_visitante INT NOT NULL,
    id_jogo INT NOT NULL,
    FOREIGN KEY (id_jogo) REFERENCES Jogo(id)
);