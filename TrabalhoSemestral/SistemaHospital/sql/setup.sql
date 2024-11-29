-- Tabela de setores avaliados
CREATE TABLE setores (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

-- Tabela de perguntas
CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto VARCHAR(255) NOT NULL,
    ativa BOOLEAN NOT NULL
);

-- Tabela de avaliações gerais (uma por submissão)
CREATE TABLE avaliacoes (
    id SERIAL PRIMARY KEY,
    setor_id INT REFERENCES setores(id) ON DELETE CASCADE,
    feedback_geral TEXT, -- Feedback opcional sobre o setor avaliado
    data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de respostas individuais para cada pergunta
CREATE TABLE respostas (
    id SERIAL PRIMARY KEY,
    avaliacao_id INT REFERENCES avaliacoes(id) ON DELETE CASCADE,
    pergunta_id INT REFERENCES perguntas(id) ON DELETE CASCADE,
    nota INT CHECK (nota BETWEEN 1 AND 10), -- Avaliação de 1 a 10
    feedback TEXT                            -- Feedback opcional
);

-- Tabela de usuários administrativos
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
