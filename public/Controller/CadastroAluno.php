<?php
require_once 'Model/Aluno.php';
require_once 'data_base/insertBD.php';
class CadastroAluno{

    public function cadastrarAluno($nUSP, $nome, $email, $senha, $link, $Cod_Curso, $cpf){
        $aluno = new Aluno($nUSP, $nome, $email, $senha, $link, $Cod_Curso, $cpf);
        $bd = new insertBD();
        $resultado = $bd->cadastrarAlunoDB($aluno);
        return $resultado;
    }
}
