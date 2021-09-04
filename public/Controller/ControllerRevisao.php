<?php

use PHPUnit\TextUI\ResultPrinter;

require_once 'data_base/GetFormulario.php';
require_once 'data_base/insertBD.php';

class ControllerRevisao{


    function adquireRelatorioFromDB($codigo){
        $bd = new GetFormulario();
        $responseForm = $bd->getFormulario($codigo);
        if($responseForm !== NULL){
            $responseAlunoForm = $bd->getInformacoesDoAluno($responseForm->getCodigoAluno());
                $_REQUEST["aluno_form"] = $responseAlunoForm;
        }
        $_REQUEST["formulario"] = $responseForm;
        require_once 'View/revisao_relatorio.php';
    }

    function insereAvalicaoDoProfessorNaDB($nota, $parecer, $codForm){
        $bd = new insertBD();
        $result = $bd->adicionaAvaliacaoDoProfessor($nota, $parecer, $codForm);
        return $result;
    }

    function insereAvalicaoDoCCPNaDB($nota, $parecer, $codForm, $CPF_CCP){
        $bd = new insertBD();
        $result = $bd->adicionaAvaliacaoDoCCP($nota, $parecer, $codForm, $CPF_CCP);
        return $result;
    }

}

?>