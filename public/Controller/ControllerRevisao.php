<?php 
require_once 'data_base/GetFormulario.php';

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

}

?>