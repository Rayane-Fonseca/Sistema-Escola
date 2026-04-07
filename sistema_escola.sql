CREATE DATABASE IF NOT EXISTS sistema_escola;
USE sistema_escola;

CREATE TABLE IF NOT EXISTS estudantes(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    matricula VARCHAR(50) NOT NULL
);

SELECT * FROM estudantes;