CREATE DATABASE sistema_de_avaliacao;
 
CREATE TABLE Cursos(
	Codigo int(11) not null primary key auto_increment,
    Nome varchar(20) not null
);

CREATE TABLE Aluno(
	Numero_USP varchar(20) NOT NULL PRIMARY KEY,
    Nome varchar(100) Not null,
    Email varchar(100) not null UNIQUE,
    Senha varbinary(128) not null,
    Link_Curriculo varchar(256) not null,
    Cod_Curso int(11) not null,
    FOREIGN KEY (Cod_Curso) REFERENCES Cursos(Codigo),
    CPF varchar(14) not null UNIQUE
);

CREATE TABLE Professor(
	CPF varchar(14) NOT NULL PRIMARY KEY,
    Nome varchar(100) Not null,
    Email varchar(100) not null UNIQUE,
    Senha varbinary(128) not null
);

Create table Nota(
	Codigo int(11) not null primary key auto_increment,
    Nome varchar(50) not null
);

Create table ProfessorResp(
	Numero_USP varchar(20) NOT NULL,
    FOREIGN KEY (Numero_USP) REFERENCES Aluno(Numero_USP),
    CPF_Prof varchar(14) not null,
    FOREIGN KEY (CPF_Prof) REFERENCES Professor(CPF),
    Primary Key(Numero_USP, CPF_Prof)
);

Create table CCP(
	CPF_prof varchar(14) not null primary key,
    FOREIGN KEY (CPF_prof) REFERENCES Professor(CPF)
);

CREATE TABLE Formulario(
    Codigo int(11) PRIMARY KEY auto_increment,
    Numero_USP varchar(20) NOT NULL,
    FOREIGN KEY (Numero_USP) REFERENCES Aluno(Numero_USP),
    Data_Envio datetime not null,
    Questao_6 varchar(128) NOT NULL,
    Questao_7 varchar(128) NOT NULL,
    Questao_8 int(11) NOT NULL,
    FOREIGN KEY (Questao_8) REFERENCES Cursos(Codigo),
    Questao_9 varchar(128),
    Questao_10 varchar(128),
    Questao_11 varchar(128) NOT NULL,
    Questao_12 varchar(128) NOT NULL,
    Questao_13 varchar(128),
    Questao_14 varchar(128) NOT NULL,
    Questao_15 varchar(128) NOT NULL,
    Questao_16 varchar(128) NOT NULL,
    Questao_17 varchar(128) NOT NULL,
    Questao_18 varchar(128),
    Questao_19 varchar(128),
    Questao_20 varchar(128) NOT NULL,
    Questao_21 varchar(128) NOT NULL,
    Questao_22 varchar(128) NOT NULL,
    Questao_23 text NOT NULL,
    Questao_24 text NOT NULL,
    Questao_25 text NOT NULL,
    Questao_26 text NOT NULL,
    Questao_27 text,
    Questao_28 text
);

Create table AvaliacaoProf(
	Cod_Form int(11) NOT NULL,
    FOREIGN KEY (Cod_Form) REFERENCES Formulario(Codigo),
    CPF_Prof varchar(14) not null,
    FOREIGN KEY (CPF_Prof) REFERENCES Professor(CPF),
    Parecer text not null,
    Cod_Nota int(11) not null,
    foreign key(Cod_Nota) references Nota(Codigo),
    Primary Key(Cod_Form, CPF_Prof)
);

Create table AvaliacaoCCP(
	Cod_Form int(11) NOT NULL,
    FOREIGN KEY (Cod_Form) REFERENCES Formulario(Codigo),
    CPF_CCP varchar(14) not null,
    FOREIGN KEY (CPF_CCP) REFERENCES CCP(CPF_prof),
    Parecer text not null,
    Cod_Nota int(11) not null,
    foreign key(Cod_Nota) references Nota(Codigo),
    Primary Key(Cod_Form, CPF_CCP)
);

insert into Nota(Nome) values("ADEQUADO"),("ADEQUADO COM RESSALVAS"), ("INSATISFATÓRIO");

insert into Cursos(Nome) values("Mestrado"),("Doutorado");

INSERT INTO `aluno` (`Numero_USP`, `Nome`, `Email`, `Senha`, `Link_Curriculo`, `Cod_Curso`, `CPF`) VALUES
('00123456789012345678', 'Zé Silva', 'ze@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-00'),
('01123456789012345678', 'Rafael Coréia', 'rafael@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-01'),
('02123456789012345678', 'Aluno 1', 'aluno_1@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-02'),
('03123456789012345678', 'Aluno 2', 'aluno_2@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-03'),
('04123456789012345678', 'Aluno 3', 'aluno_3@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-04'),
('05123456789012345678', 'Aluno 4', 'aluno_4@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-05'),
('06123456789012345678', 'Aluno 5', 'aluno_5@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-06'),
('07123456789012345678', 'Aluno 6', 'aluno_6@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-07'),
('08123456789012345678', 'Aluno 7', 'aluno_7@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-08'),
('09123456789012345678', 'Aluno 8', 'aluno_8@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-09'),
('10123456789012345678', 'Aluno 9', 'aluno_9@gmail.com', MD5('senha123'), 'https://www.google.com', 1, '111.111.111-10'),
('11123456789012345678', 'Aluno 10', 'aluno_10@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-11'),
('12123456789012345678', 'Aluno 11', 'aluno_11@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-12'),
('13123456789012345678', 'Aluno 12', 'aluno_12@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-13'),
('14123456789012345678', 'Aluno 13', 'aluno_13@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-14'),
('15123456789012345678', 'Aluno 14', 'aluno_14@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-15'),
('16123456789012345678', 'Aluno 15', 'aluno_15@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-16'),
('17123456789012345678', 'Aluno 16', 'aluno_16@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-17'),
('18123456789012345678', 'Aluno 17', 'aluno_17@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-18'),
('19123456789012345678', 'Aluno 18', 'aluno_18@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-19'),
('20123456789012345678', 'Aluno 19', 'aluno_19@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-20'),
('21123456789012345678', 'Aluno 20', 'aluno_20@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-21'),
('22123456789012345678', 'Aluno 21', 'aluno_21@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-22'),
('23123456789012345678', 'Aluno 22', 'aluno_22@gmail.com', MD5('senha123'), 'https://www.google.com', 2, '111.111.111-23');


INSERT INTO `formulario` (`Numero_USP`,`Data_envio`, `Questao_6`, `Questao_7`, `Questao_8`, `Questao_9`, `Questao_10`, `Questao_11`, `Questao_12`, `Questao_13`, `Questao_14`, `Questao_15`, `Questao_16`, `Questao_17`, `Questao_18`, `Questao_19`, `Questao_20`, `Questao_21`, `Questao_22`, `Questao_23`, `Questao_24`, `Questao_25`, `Questao_26`, `Questao_27`, `Questao_28`) VALUES
("00123456789012345678", "2021-08-30 10:30:00", 'q1', 'q2', 1, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("02123456789012345678", "2021-08-30 11:30:00", 'q1', 'q2', 1, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("04123456789012345678", "2021-08-30 12:30:00", 'q1', 'q2', 1, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("06123456789012345678", "2021-08-30 13:30:00", 'q1', 'q2', 1, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("08123456789012345678", "2021-09-01 10:30:00", 'q1', 'q2', 1, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("10123456789012345678", "2021-09-01 11:30:00", 'q1', 'q2', 1, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("12123456789012345678", "2021-09-01 12:30:00", 'q1', 'q2', 2, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("14123456789012345678", "2021-09-02 10:30:00", 'q1', 'q2', 2, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("16123456789012345678", "2021-09-02 11:30:00", 'q1', 'q2', 2, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23'),
("18123456789012345678", "2021-09-02 12:30:00", 'q1', 'q2', 2, 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q1', 'q1', 'q17', 'q18', 'q19', '0', '1', 'q22', 'q23');

INSERT INTO `professor` (`CPF`, `Nome`, `Email`, `Senha`) VALUES
('123.456.789-01', 'José Alves da Silva', 'jose_alves@usp.br', MD5('senha321')),
('123.456.789-02', 'Carlos Silva', 'carlos_silva@usp.br', MD5('senha321')),
('123.456.789-03', 'Rogéria Nogueira Santos', 'rog_nog@usp.br', MD5('senha321')),
('123.456.789-04', 'Carla Souza', 'carla_souza@usp.br', MD5('senha321')),
('123.456.789-05', 'Eduardo Pinheiro Couto', 'edu_pinheiro@usp.br', MD5('senha321')),
('123.456.789-06', 'Jorge Bastos', 'jorge_bastos@usp.br', MD5('senha321')),
('123.456.789-07', 'Helena Constantim', 'helena_const@usp.br', MD5('senha321')),
('123.456.789-08', 'Letícia Maquiaveli', 'let_maq@usp.br', MD5('senha321')),
('123.456.789-09', 'Marcos Monteiro', 'marcos_mont@usp.br', MD5('senha321')),
('123.456.789-10', 'Lucas West', 'lucas_w@usp.br', MD5('senha321'));

INSERT INTO `professorresp` (`Numero_USP`, `CPF_Prof`) VALUES
('00123456789012345678', '123.456.789-02'),
('01123456789012345678', '123.456.789-02'),
('02123456789012345678', '123.456.789-02'),
('03123456789012345678', '123.456.789-02'),
('04123456789012345678', '123.456.789-02'),
('05123456789012345678', '123.456.789-02'),
('06123456789012345678', '123.456.789-02'),
('07123456789012345678', '123.456.789-04'),
('08123456789012345678', '123.456.789-04'),
('09123456789012345678', '123.456.789-06'),
('10123456789012345678', '123.456.789-06'),
('11123456789012345678', '123.456.789-06'),
('12123456789012345678', '123.456.789-06'),
('13123456789012345678', '123.456.789-06'),
('14123456789012345678', '123.456.789-06'),
('15123456789012345678', '123.456.789-06'),
('16123456789012345678', '123.456.789-06'),
('17123456789012345678', '123.456.789-06'),
('18123456789012345678', '123.456.789-06'),
('19123456789012345678', '123.456.789-06'),
('20123456789012345678', '123.456.789-10'),
('21123456789012345678', '123.456.789-10'),
('22123456789012345678', '123.456.789-10'),
('23123456789012345678', '123.456.789-10');

INSERT INTO `ccp` (`CPF_prof`) VALUES
('123.456.789-05'),
('123.456.789-01'),
('123.456.789-10');

INSERT INTO `avaliacaoccp` (`Cod_Form`, `CPF_CCP`, `Parecer`, `Cod_Nota`) VALUES
(1, '123.456.789-05', 'Ta uma merda', 3),
(5, '123.456.789-01', 'Ta bom', 2),
(3, '123.456.789-10', 'Ta medio', 1);

INSERT INTO `avaliacaoprof` (`Cod_Form`, `CPF_Prof`, `Parecer`, `Cod_Nota`) VALUES
(1, '123.456.789-05', 'Foi bom', 1),
(5, '123.456.789-01', 'Foi medio', 2),
(3,'123.456.789-10', 'Foi ruim', 3);