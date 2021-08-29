<?php
require_once('Model/Aluno.php');
require_once('data_base/functions.php');
class insertBD{

    public function cadastrarAlunoDB(Aluno $aluno){
        $numUsp = $aluno->getNumero_USP();
        $nome = $aluno->getNome();
        $email = $aluno->getEmail();
        $senha = $aluno->getSenha();
        $link = $aluno->getLink_Curriculo();
        $curso = $aluno->getCod_Curso();
        $cpf = $aluno->getCPF();
        $query = "INSERT INTO aluno values('$numUsp', '$nome', '$email', MD5('$senha'), '$link','$curso','$cpf')";
        $result = runSQL($query);
        return $result;
    }

    public function cadastrarProfessorDB(Professor $prof){
        $nome = $prof->getNome();
        $email = $prof->getEmail();
        $senha = $prof->getSenha();
        $cpf = $prof->getCPF();
        $query = "INSERT INTO professor values('$cpf', '$nome', '$email', MD5('$senha'))";
        $result = runSQL($query);
        return $result;
    }

    public function cadastrarCCPDB($cpf){
        $query = "INSERT INTO CCP values('$cpf')";
        $result = runSQL($query);
        return $result;
    }
}