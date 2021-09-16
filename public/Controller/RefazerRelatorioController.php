<?php
require_once('DBServices/insertBD.php');

class RefazerRelatorioController//TODO Não da pra inserir isso no RelatorioController?
{
    public function solicitaRefazer($cod){
        $bd = new insertBD();
        $resultado = $bd->solicitaRefazer($cod);
        return $resultado;
    }
}