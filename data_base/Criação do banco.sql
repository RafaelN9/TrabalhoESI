CREATE DATABASE sistema_de_avaliacao;
 
CREATE TABLE Formulario(
    Codigo int(11) PRIMARY KEY NOT NULL auto_increment,
    Questao_6 varchar(128) NOT NULL,
    Questao_7 varchar(128) NOT NULL,
    Questao_8 varchar(128) NOT NULL,
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
    Questao_20 varchar(2) NOT NULL,
    Questao_21 varchar(2) NOT NULL,
    Questao_22 varchar(128) NOT NULL,
    Questao_23 text NOT NULL,
    Questao_24 text NOT NULL,
    Questao_25 text NOT NULL,
    Questao_26 text NOT NULL,
    Questao_27 text,
    Questao_28 text
);

CREATE TABLE Cursos(
	Codigo int(11) not null primary key auto_increment,
    Nome varchar(20) not null
);

CREATE TABLE Aluno(
	Numero_USP varchar(20) NOT NULL PRIMARY KEY,
    Nome varchar(100) Not null,
    Email varchar(100) not null,
    Senha varchar(16) not null,
    Link_Curriculo varchar(256) not null,
    Cod_Curso int(11) not null,
    FOREIGN KEY (Cod_Curso) REFERENCES Cursos(Codigo),
    CPF varchar(14) not null
);

Create table FormularioEnviado(
	Numero_USP varchar(20) NOT NULL,
    FOREIGN KEY (Numero_USP) REFERENCES Aluno(Numero_USP),
    Cod_Formulario int(11) not null,
    FOREIGN KEY (Cod_Formulario) REFERENCES Formulario(Codigo),
    Data date not null,
    Primary Key(Numero_USP, Cod_Formulario)
);

CREATE TABLE Professor(
	CPF varchar(14) NOT NULL PRIMARY KEY,
    Nome varchar(100) Not null,
    Email varchar(100) not null,
    Senha varchar(16) not null
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

Create table AvaliacaoProf(
	Cod_FormEnv int(11) NOT NULL,
    FOREIGN KEY (Cod_FormEnv) REFERENCES FormularioEnviado(Cod_Formulario),
    CPF_Prof varchar(14) not null,
    FOREIGN KEY (CPF_Prof) REFERENCES Professor(CPF),
    Parecer text not null,
    Cod_Nota int(11) not null,
    foreign key(Cod_Nota) references Nota(Codigo),
    Primary Key(Cod_FormEnv, CPF_Prof)
);

Create table AvaliacaoCCP(
	Cod_FormEnv int(11) NOT NULL,
    FOREIGN KEY (Cod_FormEnv) REFERENCES FormularioEnviado(Cod_Formulario),
    CPF_CCP varchar(14) not null,
    FOREIGN KEY (CPF_CCP) REFERENCES CCP(CPF_prof),
    Parecer text not null,
    Cod_Nota int(11) not null,
    foreign key(Cod_Nota) references Nota(Codigo),
    Primary Key(Cod_FormEnv, CPF_CCP)
);

insert into Nota(Nome) values("ADEQUADO"),("ADEQUADO COM RESSALVAS"), ("INSATISFATÓRIO");

insert into Cursos(Nome) values("Mestrado"),("Doutorado");


