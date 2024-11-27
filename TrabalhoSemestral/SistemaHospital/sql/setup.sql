CREATE TABLE setores (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto VARCHAR(255) NOT NULL,
    ativa BOOLEAN NOT NULL
);

CREATE TABLE avaliacoes (
    id SERIAL PRIMARY KEY,
    setor_id INT REFERENCES setores(id),
    respostas JSON NOT NULL,
    feedback TEXT,
    data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
