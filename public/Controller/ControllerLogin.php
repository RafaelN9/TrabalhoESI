<?php
require_once 'data_base/ConsultaLogin.php';

class ControllerLogin{

    public function verificaAluno($email, $senha){
        require_once 'Model/Aluno.php';
        $aluno = new Aluno('', '', $email, $senha, '', '', '');
        $bd = new ConsultaLogin();
        $resultado = $bd->consultaAluno($aluno);
        return $resultado;
    }

    public function verificaCCP($email, $senha){
        require_once 'Model/Professor.php';
        $prof = new Professor('', '', $email, $senha);
        $bd = new ConsultaLogin();
        $resultado = $bd->consultaCCP($prof);
        return $resultado;
    }

    public function verificaProfessor($email, $senha){
        require_once 'Model/Professor.php';
        $prof = new Professor('', '', $email, $senha);
        $bd = new ConsultaLogin();
        $resultado = $bd->consultaProfessor($prof);
        return $resultado;
    }
}