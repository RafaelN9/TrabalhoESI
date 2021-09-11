<?php
require_once 'data_base/ConsultaLogin.php';

class ControllerLogin{

    public function verificaAluno($email, $senha){
        require_once 'Model/Aluno.php';
        $aluno = new Aluno('', '', $email, $senha, '', '', '');
        $bd = new ConsultaLogin();
        $resultado = $bd->consultaAluno($aluno);
        $_SESSION['nome'] = $aluno->getNome();
        $_SESSION['email'] = $aluno->getEmail();
        $_SESSION['curriculo'] = $aluno->getLink_Curriculo();
        $_SESSION['curso'] = $aluno->getCod_Curso();
        $_SESSION['numero_USP'] = $aluno->getNumero_USP();
        return $resultado;
    }

    public function verificaCCP($email, $senha){
        require_once 'Model/Professor.php';
        $prof = new Professor('', '', $email, $senha);
        $bd = new ConsultaLogin();
        $resultado = $bd->consultaCCP($prof);
        $_SESSION['nome'] = $prof->getNome();
        $_SESSION['email'] = $prof->getEmail();
        $_SESSION['cpf'] = $prof->getCPF();
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