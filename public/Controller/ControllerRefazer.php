<?php
require_once('data_base/insertBD.php');

class ControllerRefazer
{
    public function solicitaRefazer($cod){
        $bd = new insertBD();
        $resultado = $bd->solicitaRefazer($cod);

        return $resultado;
    }
}