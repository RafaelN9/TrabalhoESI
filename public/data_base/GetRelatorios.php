<?php

use function PHPUnit\Framework\isType;

require_once 'data_base/functions.php';
require_once 'Model/Relatorio.php';


class GetRelatorios{
    
    function GetRelatoriosPendentesAluno($filter, $numUSPAluno){
        $query = 
        "SELECT 
            aluno.Nome as nome, 
            formularioenviado.Cod_Formulario as codFormularioEnviado, 
            professor.Nome as 'nomeProfessoResp',
            formularioenviado.Data as dataEnvioForm
        FROM 
            aluno, 
            professor, 
            formularioenviado,
            formulario, 
            professorresp 
        WHERE 
            (formularioenviado.Numero_USP = aluno.Numero_USP) and 
            (formularioenviado.Numero_USP = professorresp.Numero_USP) and 
            (professorresp.CPF_Prof = professor.CPF) and
            (aluno.Numero_USP = $numUSPAluno) $filter
        group by formularioenviado.Numero_USP, formularioenviado.Cod_Formulario";

        $result = runSQL($query);
        $relatoriosArray = array();
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioProfessor(
                $row["nome"],
                $row["nomeProfessoResp"],
                $row["codFormularioEnviado"],
                $row["dataEnvioForm"]
            );
            $relatoriosArray[] = $relatorio;
        }
        
        return $relatoriosArray;
    }

    function GetRelatoriosPendentesCCP($filter, $cpfCCP){
        $query = 
        "SELECT 
            aluno.Nome as nome, 
            formularioenviado.Cod_Formulario as codFormularioEnviado, 
            professor.Nome as 'nomeProfessoResp',
            formularioenviado.Data as dataEnvioForm
        FROM 
            aluno, 
            professor, 
            formularioenviado,
            formulario, 
            professorresp 
        WHERE 
            (formularioenviado.Numero_USP = aluno.Numero_USP) and 
            (formularioenviado.Numero_USP = professorresp.Numero_USP) and 
            (professorresp.CPF_Prof = professor.CPF) and
            (professor.CPF IN (SELECT * FROM ccp)) and
            (professor.CPF = $cpfCCP) $filter
        group by formularioenviado.Numero_USP, formularioenviado.Cod_Formulario";

        $result = runSQL($query);
        $relatoriosArray = array();
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioProfessor(
                $row["nome"],
                $row["nomeProfessoResp"],
                $row["codFormularioEnviado"],
                $row["dataEnvioForm"]
            );
            $relatoriosArray[] = $relatorio;
        }
        
        return $relatoriosArray;
    }

    function GetRelatoriosPendentesProfessor($filter, $cpfProf){
        $query = 
        "SELECT 
            aluno.Nome as nome, 
            formularioenviado.Cod_Formulario as codFormularioEnviado, 
            professor.Nome as 'nomeProfessoResp',
            formularioenviado.Data as dataEnvioForm
        FROM 
            aluno, 
            professor, 
            formularioenviado,
            formulario, 
            professorresp 
        WHERE 
            (formularioenviado.Numero_USP = aluno.Numero_USP) and 
            (formularioenviado.Numero_USP = professorresp.Numero_USP) and 
            (professorresp.CPF_Prof = professor.CPF) and
            (professor.CPF = '$cpfProf') $filter
        group by formularioenviado.Numero_USP, formularioenviado.Cod_Formulario";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $relatorio = new RelatorioProfessor(
                    $row["nome"],
                    $row["codFormularioEnviado"],
                    $row["dataEnvioForm"]
                );
                $relatoriosArray[] = $relatorio;
            }
        }
        
        return $relatoriosArray;
    }

}
