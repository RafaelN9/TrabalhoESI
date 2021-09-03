<?php 

require_once 'data_base/functions.php';
require_once 'Model/Formulario.php';

class GetFormulario{

    function getFormulario($codigo){
        $query = "SELECT
        professor.Nome AS nomeProfessor,
        aluno.Nome,
        aluno.Email,
        aluno.Link_Curriculo,
        formulario.*,
        cursos.Nome as curso,
        nota.Nome as nota
    FROM
        `formulario`,
        aluno,
        professorresp,
        professor,
        cursos,
        nota
    WHERE
        formulario.Numero_USP = aluno.Numero_USP AND 
        aluno.Numero_USP = professorresp.Numero_USP AND 
        professorresp.CPF_Prof = professor.CPF AND 
        cursos.Codigo = formulario.Questao_7 AND 
        nota.Codigo = formulario.Questao_8 AND 
        formulario.Codigo = '$codigo';";

        $result = runSQL($query);

        if(mysqli_num_rows($result) != 0){
            if($row = mysqli_fetch_assoc($result)){
                $formulario = new Formulario($row['Numero_USP'], $row['Data_Envio'], 
                $row['Questao_6'], $row['curso'], $row['nota'], $row['Questao_9'], 
                $row['Questao_10'], $row['Questao_11'], $row['Questao_12'], $row['Questao_13'], 
                $row['Questao_14'], $row['Questao_15'], $row['Questao_16'], $row['Questao_17'], 
                $row['Questao_18'], $row['Questao_19'], $row['Questao_20'], $row['Questao_21'], 
                $row['Questao_22'], $row['Questao_23'], $row['Questao_24'], $row['Questao_25'], 
                $row['Questao_26'], $row['Questao_27'], $row['nomeProfessor']);
                
                return $formulario;
    
            }
        }

    }
    
    function getInformacoesDoAluno($n_usp){
        $query = "SELECT Nome, Numero_USP, Email, Link_Curriculo FROM `aluno` WHERE Numero_USP = '$n_usp';";
        
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result)){
            $aluno = new Aluno($row['Numero_USP'], $row['Nome'], $row['Email'], '', $row['Link_Curriculo'], '', '');
            return $aluno;
        }
    }

}

?>