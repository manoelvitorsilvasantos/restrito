#CRIA BASE DE DADOS.
CREATE DATABASE IF NOT EXISTS api; 

#USA ESSA BASE DE DADOS
USE api;

#CRIA UMA TABELA SE NAO EXISTIR
CREATE TABLE IF NOT EXISTS login(
    id INT (11)NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(32) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    email VARCHAR(256) NOT NULL,
    nivel int(11) NOT NULL,
    PRIMARY KEY(id)

)AUTO_INCREMENT = 1;

#INSERE OS DADOS
INSERT INTO login(usuario, senha, email, nivel) VALUES
('admin', MD5('65564747'), 'mvictordossantos.limite@gmail.com', 3),
('mvictor', MD5('65564747'),'mvictordossantos.limite@gmail.com',3),
('victor', MD5('65564747'), 'mvictordossantos@gmail.com', 2);

#CRIA UMA TABELA SE NAO EXISTIR
CREATE TABLE IF NOT EXISTS pessoas(
    codigo int(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    email VARCHAR(256) NOT NULL,
    sexo enum('MASCULINO', 'FEMININO', 'NEUTRO'),
    profissao VARCHAR(32) NOT NULL,
    PRIMARY KEY(codigo)
)AUTO_INCREMENT = 1;

#CRIA UMA TABELA SE NAO EXISTIR
CREATE TABLE  IF NOT EXISTS users(
    id int(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    age VARCHAR(11) NOT NULL,
    sexy enum('MaASCULINO', 'FEMININO', 'NEUTRO'),
    PRIMARY KEY(id)
) AUTO_INCREMENT = 1;

#TABELA registor pega os endereco ip dos acessos.
CREATE TABLE IF NOT EXISTS registro(
	id INT NOT NULL AUTO_INCREMENT,
    ip VARCHAR(16) NOT NULL,
    usuario VARCHAR(32) NOT NULL,
    horario TIME NOT NULL,
    dt DATE NOT NULL,
    PRIMARY KEY(id)
)AUTO_INCREMENT = 1;
