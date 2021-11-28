create database teste

--drop table clientes
--drop table dash
--drop table servicos

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
    codigo_cliente int(6) NOT NULL,
    tipo varchar(50) NOT NULL,
    renavam varchar(15) NOT NULL,
    placa varchar(25) NOT NULL,
    observacao varchar(5000),
    preco varchar(15),
    prazo varchar(30),
    status_pedido varchar(30) NOT NULL,
    status_doc varchar(30),
    data_pedido varchar(30)
);

create table dash(
    id int(6) primary key NOT NULL AUTO_INCREMENT,
    dashuser varchar(30) NOT NULL,
    senha varchar(30) NOT NULL
);

insert into dash(dashuser, senha) values('admin', 'senhamuitodificil');
insert into servicos(codigo_cliente, tipo, renavam, placa, observacao, status_pedido) values(8, 'Licenciamento', '32464740981', 'KCO-4150', 'Aguardando...', 'Em Andamento!');
