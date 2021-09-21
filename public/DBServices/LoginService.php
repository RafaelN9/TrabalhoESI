<?php
require_once('DBServices/DataBaseService.php');

class LoginService{

    public function consultaAluno(Aluno $aluno){
        $email = $aluno->getEmail();
        $senha = $aluno->getSenha();

        $query = "SELECT 
            Numero_USP, 
            Nome, 
            Link_Curriculo, 
            CPF, 
            Cod_Curso as curso 
        FROM 
            aluno 
        WHERE 
            Email = '$email' AND 
            Senha = MD5('$senha') AND 
            NOT EXISTS(
                SELECT 
                    * 
                FROM 
                    alunodesligado 
                WHERE 
                    alunodesligado.Numero_USP = aluno.Numero_USP
            )
        LIMIT 1";
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result)){
            $aluno->setCod_Curso($row['curso']);
            $aluno->setNome($row['Nome']);
            $aluno->setNumero_USP($row['Numero_USP']);
            $aluno->setLink_Curriculo($row['Link_Curriculo']);
            $aluno->setCPF($row['CPF']);
            return $row["Numero_USP"];
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
            return $row["CPF"];
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
            return $row["CPF"];
        }

        return false;
    }
}