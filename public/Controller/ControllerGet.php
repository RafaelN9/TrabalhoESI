<?php
require_once 'data_base/GetBanco.php';

class ControllerGet
{

    public function getAlunoFormulario($codigo){
        $get = new GetBanco();
        return $get->getAlunoFromFormulario($codigo);
    }

    public function getProfFromAluno($codigo){
        $get = new GetBanco();
        return $get->getProfFromAluno($codigo);
    }

    public function getCCP(){
        $get = new GetBanco();
        return $get->getCCP();
    }
}