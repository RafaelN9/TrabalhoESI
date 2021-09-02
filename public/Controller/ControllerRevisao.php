<?php 
require_once 'data_base/GetFormulario.php';

class ControllerRevisao{


    function adquireRelatorioFromDB($n_usp, $codigo){
        $bd = new GetFormulario();
        $responseForm = $bd->getFormularioPreenchido($n_usp, $codigo);
        $responseAlunoForm = $bd->getInformacoesDoAluno($n_usp);
        $_REQUEST["formulario"] = $responseForm->fetch_assoc();
        $_REQUEST["aluno_form"] = $responseAlunoForm->fetch_assoc();
        require_once 'View/revisao_relatorio.php';
    }

}

?>