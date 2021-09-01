<?php

use function PHPUnit\Framework\isType;
require_once 'data_base/functions.php';
require_once 'Model/Relatorio.php';


class GetRelatorios{
    
    function GetRelatoriosPendentesAluno($filter, $numUSPAluno){
        $query = 
        "SELECT 
            formulario.Codigo as codFormulario,
            formulario.Data_Envio as dataEnvioForm
        FROM 
            formulario, 
        WHERE 
            (formulario.Numero_USP = '$numUSPAluno') $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioAluno(
                $row["codFormulario"],
                $row["dataEnvioForm"]
            );
            $relatoriosArray[] = $relatorio->toMap($relatorio);
        }
        
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }

    function GetRelatoriosPendentesCCP($filter, $cpfCCP){
        $query = 
        "SELECT 
            aluno.Nome as nomeAluno, 
            formulario.Codigo as codFormulario, 
            professor.Nome as 'nomeProfessoResp',
            formulario.Data_Envio as dataEnvioForm
        FROM 
            aluno, 
            professor, 
            formulario, 
            professorresp 
        WHERE 
            (formulario.Numero_USP = aluno.Numero_USP) and 
            (formulario.Numero_USP = professorresp.Numero_USP) and 
            (professorresp.CPF_Prof = professor.CPF) and
            (professor.CPF IN (SELECT * FROM ccp)) and
            (professor.CPF = '$cpfCCP') $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioCCP(
                $row["nomeAluno"],
                $row["nomeProfessorResp"],
                $row["codFormulario"],
                $row["dataEnvioForm"]
            );
            $relatoriosArray[] = $relatorio->toMap($relatorio);
        }
        
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }

    function GetRelatoriosPendentesProfessor($filter, $cpfProf){
        $query = 
        "SELECT 
        aluno.Nome as nomeAluno, 
        formulario.Codigo as codFormulario, 
        formulario.Data_Envio as dataEnvioForm
    FROM 
        aluno, 
        professor, 
        formulario, 
        professorresp 
    WHERE 
        (formulario.Numero_USP = aluno.Numero_USP) and 
        (formulario.Numero_USP = professorresp.Numero_USP) and 
        (professorresp.CPF_Prof = professor.CPF) and
        (professor.CPF = '$cpfProf') $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $relatorio = new RelatorioProfessor(
                    $row["nomeAluno"],
                    $row["codFormulario"],
                    $row["dataEnvioForm"]
                );
                $relatoriosArray[] = $relatorio->toMap($relatorio);
            }
        }
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }

}
