<?php
require_once('data_base/functions.php');

class ConsultaLogin{

    public function consultaAluno(Aluno $aluno){
        $email = $aluno->getEmail();
        $senha = $aluno->getSenha();

        $query = "SELECT Email FROM aluno WHERE Email = '$email' AND Senha = MD5('$senha') LIMIT 1";
        $result = runSQL($query);
        if(mysqli_fetch_assoc($result)){
            $_SESSION["tipo_usuario"] = 'aluno';
            return true;
        }

        return false;
    }

    public function consultaCCP(Professor $prof){
        $email = $prof->getEmail();
        $senha = $prof->getSenha();

        $query = "SELECT Email FROM professor INNER JOIN ccp on professor.CPF = ccp.CPF_Prof WHERE Email = '$email' AND Senha = MD5('$senha') LIMIT 1";
        $result = runSQL($query);
        if(mysqli_fetch_assoc($result)){
            $_SESSION["tipo_usuario"] = 'ccp';
            return true;
        }

        return false;
    }

    public function consultaProfessor(Professor $prof){
        $email = $prof->getEmail();
        $senha = $prof->getSenha();

        $query = "SELECT Email FROM professor WHERE Email = '$email' AND Senha = MD5('$senha') LIMIT 1";
        $result = runSQL($query);
        if(mysqli_fetch_assoc($result)){
            $_SESSION["tipo_usuario"] = 'professor';
            return true;
        }

        return false;
    }
}