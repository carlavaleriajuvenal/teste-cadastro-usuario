CREATE DATABASE cadastro_usuarios;

USE cadastro_usuarios;

CREATE TABLE usuario (
       id SERIAL PRIMARY KEY,
       nome VARCHAR(100) NOT NULL,
       email VARCHAR(100) UNIQUE NOT NULL,
       senha VARCHAR(255) NOT NULL,
       data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 