CREATE TABLE dispositivos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    status VARCHAR(10) NOT NULL CHECK (status IN ('ativo', 'inativo'))
);

CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status VARCHAR(10) NOT NULL CHECK (status IN ('ativa', 'inativa'))
);

CREATE TABLE setores (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE avaliacoes (
    id SERIAL PRIMARY KEY,
    id_setor INT NOT NULL,
    id_pergunta INT NOT NULL,
    id_dispositivo INT NOT NULL,
    resposta INT NOT NULL CHECK (resposta BETWEEN 0 AND 10),
    feedback TEXT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_setor) REFERENCES setores(id),
    FOREIGN KEY (id_pergunta) REFERENCES perguntas(id),
    FOREIGN KEY (id_dispositivo) REFERENCES dispositivos(id)
);

CREATE TABLE usuarios_admin (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
