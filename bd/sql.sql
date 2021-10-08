create database teste

//drop table clientes
//drop table dash

create table clientes(
codigo int(6) primary key NOT NULL AUTO_INCREMENT,
nome varchar(30) NOT NULL,
cpf varchar(30) NOT NULL,
cep varchar(30) NOT NULL,
telefone varchar(15) NOT NULL,
email varchar(50) NOT NULL,
senha varchar(50) NOT NULL,
datinha varchar(30) NOT NULL,
recuperar_senha varchar(220)
);

create table servicos(
codigo int(6) primary key NOT NULL AUTO_INCREMENT,
nome_cliente varchar(30) NOT NULL,
email_cliente varchar(50) NOT NULL,
tipo varchar(30) NOT NULL,
renavam varchar(15) NOT NULL,
placa varchar(10) NOT NULL
);

create table dash(
id int(6) primary key NOT NULL AUTO_INCREMENT,
dashuser varchar(30) NOT NULL,
senha varchar(30) NOT NULL
);

insert into dash(dashuser, senha) values('admin', 'senhaincrivelmentedificil');
