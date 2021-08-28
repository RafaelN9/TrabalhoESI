<?php
require_once('data_base/functions.php');

class ConsultaLogin{

    public function consultaAluno(Aluno $aluno){
        $email = $aluno->getEmail();
        $senha = $aluno->getSenha();

        $query = "SELECT Email FROM aluno WHERE Email = '$email' AND Senha = MD5('$senha') LIMIT 1";
        $result = runSQL($query);
        if(mysqli_fetch_assoc($result)){
            return true;
        }
        return false;
    }

    public function consultaCCP(Professor $prof){
        $email = $prof->getEmail();
        $senha = $prof->getSenha();

        $query = "SELECT professor.Nome, professor.CPF FROM professor INNER JOIN ccp on professor.CPF = ccp.CPF_Prof WHERE Email = '$email' AND Senha = MD5('$senha') LIMIT 1";
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result)){
            $prof->setNome("$row[Nome]");
            $prof->setCPF("$row[CPF]");
            return true;
        }
        return false;
    }

    public function consultaProfessor(Professor $prof){
        $email = $prof->getEmail();
        $senha = $prof->getSenha();

        $query = "SELECT Nome, CPF FROM professor WHERE Email = '$email' AND Senha = MD5('$senha') LIMIT 1";
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result)){
            $prof->setNome("$row[Nome]");
            $prof->setCPF("$row[CPF]");
            return true;
        }

        return false;
    }
}