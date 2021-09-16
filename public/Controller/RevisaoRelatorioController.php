<?php

use PHPUnit\TextUI\ResultPrinter;

require_once 'DBServices/RevisaoService.php';
require_once 'DBServices/insertBD.php';

class RevisaoRelatorioController{


    function adquireRelatorioFromDB($codigo){
        $bd = new RevisaoService();
        $responseForm = $bd->getFormularioParaRevisar($codigo);
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