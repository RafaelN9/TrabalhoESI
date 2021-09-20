<?php

use function PHPUnit\Framework\isType;
require_once 'DBServices/DataBaseService.php';
require_once 'Model/Relatorio.php';
require_once 'Model/RelatorioAluno.php';
require_once 'Model/RelatorioProfessor.php';
require_once 'Model/RelatorioCCP.php';


class RelatoriosService{

    function getRelatoriosPendentesAluno($filter, $numUSPAluno){
        $query = 
        "SELECT 
            formulario.Codigo as codFormulario,
            formulario.Data_Envio as dataEnvioForm
        FROM 
            formulario 
        WHERE 
            (formulario.Numero_USP = '$numUSPAluno') $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioAluno(
                $row["dataEnvioForm"],
                $row["codFormulario"],
                '',
                ''
            );
            $relatoriosArray[] = $relatorio->toMap($relatorio);
        }
        
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }

    function getRelatoriosPendentesCCP($filter, $cpfCCP){
        $query = 
        "SELECT DISTINCT 
            aluno.Nome as nomeAluno, 
            formulario.Codigo as codFormulario, 
            professor.Nome as nomeProfessorResp,
            formulario.Data_Envio as dataEnvioForm,
            avaliacaoprof.Parecer,
            nota.Nome as nota
        FROM 
            aluno, 
            professor, 
            formulario, 
            professorresp,
            avaliacaoprof,
            nota
        WHERE 
            (formulario.Numero_USP = aluno.Numero_USP) and 
            (formulario.Numero_USP = professorresp.Numero_USP) and 
            (professorresp.CPF_Prof = professor.CPF) AND
            avaliacaoprof.Cod_Form = formulario.Codigo AND
            nota.Codigo = avaliacaoprof.Cod_Nota AND
            NOT EXISTS (SELECT 1 FROM avaliacaoccp WHERE avaliacaoccp.Cod_Form = formulario.Codigo) $filter ";


        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $relatorio = new RelatorioCCP(
                    $row["nomeAluno"],
                    $row["codFormulario"],
                    $row["nomeProfessorResp"],
                    $row["dataEnvioForm"],
                    $row["Parecer"],
                    $row["nota"]
                );
                $relatoriosArray[] = $relatorio->toMap($relatorio);
            }
        }

        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }

    function getRelatoriosPendentesProfessor($filter, $cpfProf){
        $query = 
        "SELECT DISTINCT 
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
    (professor.CPF = '$cpfProf') AND
    NOT EXISTS (SELECT 1 FROM avaliacaoprof WHERE avaliacaoprof.Cod_Form = formulario.Codigo) $filter ";



        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $relatorio = new RelatorioProfessor(
                    $row["nomeAluno"],
                    $row["codFormulario"],
                    $row["dataEnvioForm"],
                    '',
                    ''
                );
                $relatoriosArray[] = $relatorio->toMap($relatorio);
            }
        }
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }


    function getHistoricoRelatoriosAluno($filter, $numUSPAluno){
        $query =
            "SELECT 
            formulario.Codigo as codFormulario,
            formulario.Data_Envio as dataEnvioForm
        FROM 
            formulario
        WHERE 
            (formulario.Numero_USP = '$numUSPAluno') $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        while($row = mysqli_fetch_assoc($result)){
            $queryNota = "SELECT avaliacaoccp.Parecer, nota.Nome as nota FROM avaliacaoccp INNER JOIN nota on nota.Codigo = avaliacaoccp.Cod_Nota WHERE avaliacaoccp.Cod_Form = $row[codFormulario] LIMIT 1";
            $resultNota = runSQL($queryNota);
            $nota = ''; $parecer = '';
            if($rowNota = mysqli_fetch_assoc($resultNota)){
                $nota = $rowNota['Parecer'];
                $parecer = $rowNota['nota'];
            }
            $relatorio = new RelatorioAluno(
                $row["dataEnvioForm"],
                $row["codFormulario"],
                $parecer,
                $nota
            );
            $relatoriosArray[] = $relatorio->toMap($relatorio);
        }

        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }

    function getHistoricoRelatoriosProfessor($filter, $cpfProf){
        $query =
            "SELECT 
        aluno.Nome as nomeAluno, 
        formulario.Codigo as codFormulario, 
        formulario.Data_Envio as dataEnvioForm,
        avaliacaoprof.Parecer as parecer,
        nota.Nome as nota
    FROM 
        aluno, 
        professor, 
        formulario, 
        professorresp,
        avaliacaoprof,
        nota
    WHERE 
        (formulario.Numero_USP = aluno.Numero_USP) and 
        (formulario.Numero_USP = professorresp.Numero_USP) and 
        (professorresp.CPF_Prof = professor.CPF) and
        (professor.CPF = '$cpfProf') and 
        (formulario.Codigo = avaliacaoprof.Cod_Form) and 
        (avaliacaoprof.Cod_Nota = nota.Codigo) $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $relatorio = new RelatorioProfessor(
                    $row["nomeAluno"],
                    $row["codFormulario"],
                    $row["dataEnvioForm"],
                    $row["parecer"],
                    $row["nota"]
                );
                $relatoriosArray[] = $relatorio->toMap($relatorio);
            }
        }
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }


    function getHistoricoRelatoriosCCP($filter, $cpfCCP){
        $query =
            "SELECT
                aluno.Numero_USP as numUSP, 
                aluno.Nome AS nomeAluno,
                formulario.Codigo AS codFormulario,
                professor.Nome AS nomeProfessorResp,
                formulario.Data_Envio AS dataEnvioForm,
                avaliacaoccp.Parecer,
                nota.Nome AS nota
            FROM
                aluno,
                professor,
                formulario,
                professorresp,
                avaliacaoccp,
                nota
            WHERE
                (
                    formulario.Numero_USP = aluno.Numero_USP
                ) AND(
                    formulario.Numero_USP = professorresp.Numero_USP
                ) AND(
                    professorresp.CPF_Prof = professor.CPF
                ) AND avaliacaoccp.Cod_Form = formulario.Codigo AND nota.Codigo = avaliacaoccp.Cod_Nota
                AND not EXISTS (SELECT 1 FROM alunodesligado WHERE alunodesligado.Numero_USP = aluno.Numero_USP)
            ORDER BY
                aluno.Numero_USP,
                formulario.Data_Envio $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioCCP(
                $row["nomeAluno"],
                $row["codFormulario"],
                $row["nomeProfessorResp"],
                $row["dataEnvioForm"],
                $row["Parecer"],
                $row["nota"]
            );
            $relatoriosArray[] = $relatorio->toMap($relatorio);
        }
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }


    function getRelaroriosRefazer($filter){
        $query =
            "SELECT
                aluno.Numero_USP as numUSP, 
                aluno.Nome AS nomeAluno,
                formulario.Codigo AS codFormulario,
                professor.Nome AS nomeProfessorResp,
                formulario.Data_Envio AS dataEnvioForm,
                avaliacaoccp.Parecer,
                nota.Nome AS nota
            FROM
                aluno,
                professor,
                formulario,
                professorresp,
                avaliacaoccp,
                nota,
                solicitarefazer
            WHERE
                (
                    formulario.Numero_USP = aluno.Numero_USP
                ) AND(
                    formulario.Numero_USP = professorresp.Numero_USP
                ) AND(
                    professorresp.CPF_Prof = professor.CPF
                ) AND(
                    formulario.Codigo = solicitarefazer.Cod_Form
                ) AND avaliacaoccp.Cod_Form = formulario.Codigo AND nota.Codigo = avaliacaoccp.Cod_Nota
                AND not EXISTS (SELECT 1 FROM alunodesligado WHERE alunodesligado.Numero_USP = aluno.Numero_USP)
            ORDER BY
                aluno.Numero_USP,
                formulario.Data_Envio $filter ";

        $result = runSQL($query);
        $relatoriosArray = array();
        if ( gettype($result) == "string"){
            return $result;
        }
        if(mysqli_num_rows($result) == 0)
            return [];
        while($row = mysqli_fetch_assoc($result)){
            $relatorio = new RelatorioCCP(
                $row["nomeAluno"],
                $row["codFormulario"],
                $row["nomeProfessorResp"],
                $row["dataEnvioForm"],
                $row["Parecer"],
                $row["nota"]
            );
            $relatoriosArray[] = $relatorio->toMap($relatorio);
        }
        return ["head" => $relatorio->getHead(), "body" => $relatoriosArray];
    }
}
