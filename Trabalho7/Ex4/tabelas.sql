CREATE TABLE pessoa (
    codigo int PRIMARY KEY auto_increment,
    nome varchar(50),
    sexo varchar(2),
    email varchar(45),
    telefone varchar(16),
    cep varchar(10),
    logradouro varchar(100),
    cidade varchar(45),
    estado varchar(45)
) ENGINE=InnoDB;

CREATE TABLE paciente (
    codigo int PRIMARY KEY auto_increment,
    peso int,
    altura int,
    tiposangue varchar(3),
    codigo_pessoa int not null,
    FOREIGN KEY (codigo_pessoa) REFERENCES pessoa(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;
