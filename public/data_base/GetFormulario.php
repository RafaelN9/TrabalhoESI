<?php 

require_once 'data_base/functions.php';
require_once 'Model/Formulario.php';

class GetFormulario{

    function getFormularioPreenchido($n_usp, $codigo){
        $query = "SELECT * FROM `formulario` WHERE `Numero_USP` = '$n_usp' AND `Codigo` = $codigo;";

        $result = runSQL($query);

        return $result;

    }

    function getInformacoesDoAluno($n_usp){
        $query = "SELECT * FROM `aluno` WHERE `Numero_USP`= '$n_usp'";
        
        $result = runSQL($query);
        
        return $result;
    }

}

?>