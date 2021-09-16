<?php
require_once 'DBServices/insertBD.php';

class AlunoEstadoController
{
    public function desliga($cod){
        $bd = new insertBD();
        $resultado = $bd->desligaAluno($cod);
        return $resultado;
    }
}