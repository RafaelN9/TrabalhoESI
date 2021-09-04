<?php
require_once 'data_base/insertBD.php';

class ControllerDesligaAluno
{
    public function desliga($cod){
        $bd = new insertBD();
        $resultado = $bd->desligaAluno($cod);
        return $resultado;
    }
}