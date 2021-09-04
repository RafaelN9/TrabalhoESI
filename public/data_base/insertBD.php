<?php
require_once('Model/Aluno.php');
require_once('Model/Formulario.php');
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

    public function enviaFormulario(Formulario $form){
        $aluno = $form->getCodigoAluno();
        $questoes = $form->getQuestoes();
        $data = $form->getDataEnvio();
        $query = "INSERT INTO Formulario(Numero_USP,Data_Envio,Questao_6,Questao_7,Questao_8,Questao_9,Questao_10,Questao_11,Questao_12,Questao_13,Questao_14,Questao_15,Questao_16,Questao_17,Questao_18,Questao_19,Questao_20,Questao_21,Questao_22,Questao_23,Questao_24,Questao_25,Questao_26,Questao_27) 
        values('$aluno','$data','$questoes[0]', '$questoes[1]', '$questoes[2]', '$questoes[3]', '$questoes[4]', '$questoes[5]', '$questoes[6]', '$questoes[7]', '$questoes[8]', '$questoes[9]', '$questoes[10]', '$questoes[11]', '$questoes[12]', '$questoes[13]', '$questoes[14]', '$questoes[15]', '$questoes[16]', '$questoes[17]', '$questoes[18]', '$questoes[19]', '$questoes[20]', '$questoes[21]')";
        $result = runSQL($query);
        return $result;
    }

    public function adicionaAvaliacaoDoProfessor($nota, $parecer, $codForm){
        $query = "INSERT INTO avaliacaoprof(
            Cod_Form,
            Cod_Nota,
            CPF_Prof,
            Parecer
        )
        VALUES(
            '$codForm',
            '$nota',
            (
            SELECT
                professorresp.CPF_Prof
            FROM
                professorresp
            WHERE
                professorresp.Numero_USP =(
                SELECT
                    formulario.Numero_USP
                FROM
                    formulario
                WHERE
                    formulario.Codigo = 11
            )
        ),
        '$parecer'
        );";
        return runSQL($query);
    }

    public function adicionaAvaliacaoDoCCP($nota, $parecer, $codForm, $CPF_CCP){
        $query = "INSERT INTO avaliacaoccp(
            Cod_Form,
            Cod_Nota,
            CPF_CCP,
            Parecer
        )
        VALUES(
            '$codForm',
            '$nota',
            '$CPF_CCP',
            '$parecer'
        );";
        return runSQL($query);
    }

    public function solicitaRefazer($cod){
        $query = "INSERT INTO solicitaRefazer values('$cod')";
        return runSQL($query);
    }

    public function desligaAluno($cod){
        $queryNum = "SELECT Numero_USP from formulario WHERE Codigo = $cod";
        $resultNum = runSQL($queryNum);
        if($row = mysqli_fetch_assoc($resultNum)) {
            $query = "INSERT INTO alunoDesligado values('$row[Numero_USP]')";
            return runSQL($query);
        }
        return $resultNum;
    }
}