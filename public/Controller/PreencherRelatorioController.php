<?php

class PreencherRelatorioController{
    private $orientador = '';
    private $nota = '';
    private $curso = '';
        
    function __construct($codigo_usuario){
        $queryCurso = "SELECT 
            cursos.* 
        FROM 
            `aluno`,
            cursos 
        WHERE 
            aluno.Cod_Curso in (SELECT codigo FROM cursos) and 
            aluno.Numero_USP = '$codigo_usuario' 
        LIMIT 1;";

        $resultCurso = runSQL($queryCurso);
        while ($rowCurso = mysqli_fetch_assoc($resultCurso)) {
            $this->curso .= "
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='q8' id='q8_$rowCurso[Codigo]' value='$rowCurso[Codigo]' checked>
                <label class='form-check-label' for='q8_$rowCurso[Codigo]'>
                    $rowCurso[Nome]
                </label>
            </div>";
        }

        $queryUltimaNota = "SELECT 
            Questao_7 
        FROM 
            `formulario`, 
            aluno 
        WHERE 
            aluno.Numero_USP = formulario.Numero_USP and
            formulario.Numero_USP = '$codigo_usuario' 
        ORDER by Data_Envio DESC LIMIT 1";
        $resultUltimaNota = runSQL($queryUltimaNota);
        $ultimaNota = '';
        if($rowUltNota = mysqli_fetch_assoc($resultUltimaNota)){
            $ultimaNota = $rowUltNota['Questao_7'];
        }

        $queryNota = "SELECT * FROM Nota";
        $resultNota = runSQL($queryNota);
        while ($rowNota = mysqli_fetch_assoc($resultNota)) {
            if($ultimaNota != ''){
                $checkedUltNota = $rowNota['Codigo'] == $ultimaNota ? 'checked' : '';
            }else{
                $checkedUltNota = $rowNota['Codigo'] == '4' ? 'checked' : '';
            }
            
            $this->nota .= "
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='q7' id='q7_$rowNota[Codigo]' value='$rowNota[Codigo]' required $checkedUltNota>
                <label class='form-check-label' for='q7_$rowNota[Codigo]'>
                    $rowNota[Nome]
                </label>
            </div>";
        }

        $queryOrientador = "SELECT 
            professor.Nome as Orientador 
        FROM 
            professor 
        INNER JOIN 
            professorresp on professor.CPF = professorresp.CPF_Prof 
        WHERE 
            professorresp.Numero_USP = '$codigo_usuario'";
        $resultOrientador = runSQL($queryOrientador);
        while ($rowOrientador = mysqli_fetch_assoc($resultOrientador)) {
            $this->orientador = $rowOrientador['Orientador'];
        }
        $request = ['orientador' => $this->orientador, 'nota' => $this->nota,'curso' => $this->curso];
        $_REQUEST['request'] = $request;
        require_once 'View/preencher_relatorio.php';
    }
}