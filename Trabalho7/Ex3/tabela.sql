CREATE TABLE logintable (
    email varchar(45) PRIMARY KEY UNIQUE,
    senhaHash varchar(255)
) ENGINE=InnoDB;