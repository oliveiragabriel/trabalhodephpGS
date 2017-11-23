DROP DATABASE IF EXISTS rede_social;
CREATE DATABASE rede_social;
USE rede_social;

CREATE TABLE usuario(
	id INT AUTO_INCREMENT,
	nome VARCHAR(20) NOT NULL,
	sobrenome VARCHAR(50) NOT NULL,
	sexo CHAR NOT NULL,
	email VARCHAR(100) UNIQUE NOT NULL,
	apelido VARCHAR(30) UNIQUE NOT NULL,
	senha VARCHAR(1000) NOT NULL,
	PRIMARY KEY (id)
)ENGINE = InnoDB;

CREATE TABLE amizade(
	id INT AUTO_INCREMENT,
	amigo_1_id INT NOT NULL,
	amigo_2_id INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (amigo_1_id) REFERENCES usuario(id) ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (amigo_1_id) REFERENCES usuario(id) ON DELETE RESTRICT ON UPDATE CASCADE,
	UNIQUE (amigo_1_id,amigo_2_id)
)ENGINE = InnoDB;

INSERT INTO usuario(nome,sobrenome,sexo,email,apelido,senha) VALUES 
('Otavio','Vieira','M','octavio@octavio.com','otacom','123456'),
('Camila','Pitanga','F','camila@pitanga.com','camila','123456'),
('Bruna','Marquesine','F','bruna@marquesine.com','bruna','123456');