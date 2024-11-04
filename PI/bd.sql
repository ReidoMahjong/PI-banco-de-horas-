criar banco mysqli

CREATE DATABASE banco de horas

criar tabelas


CREATE TABLE usuario (
    nome varchar(50),
    matricula int(4) PRIMARY KEY,
    email varchar(100),
    senha varchar(20),
    curso varchar(50),
    turno varchar(20),
    situacao varchar(20),
    telefone varchar(11),
);

CREATE TABLE certificado (
    id int(11) PRIMARY AUTO_INCREMENT,
    tipo varchar(30), 
    instituicao varchar(50),
    ano int(4),
    numero_horas int(5),
    data_envio DATE NOT NULL CURRENT_TIMESTAMP,
    img_certificado varchar(50),
    validacao int(11),
    aluno int(4),
    FOREIGN KEY (aluno) REFERENCES usuario(matricula),
);

CREATE TABLE verificacao (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    despache varchar(20),
    parecer varchar(200),
    responsavel varchar(40),
    data_veri DATE NOT NULL CURRENT_TIMESTAMP,
    certificado int(11),
    FOREIGN KEY (certificado) REFERENCES certificado(id)
);