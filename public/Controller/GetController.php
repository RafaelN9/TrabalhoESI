<?php
require_once 'DBServices/GetBanco.php';

class GetController //FIXME Nome muito ambiguo, o que esse controller fazer exatamente?
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