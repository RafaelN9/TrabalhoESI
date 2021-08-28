<?php

if(!isset($_SESSION['tipo_usuario']))
    if(isset($_POST["login"])){
        if(isset($_POST["loginEmail"]) && isset($_POST["loginPwd"])){
            require_once('Controller/ControllerLogin.php');
            $controller = new ControllerLogin();
            $result = $controller->verificaAluno($_POST["loginEmail"],$_POST["loginPwd"]);
            if($result)
                $_SESSION['tipo_usuario'] = 'aluno';
            else{
                $result = $controller->verificaCCP($_POST["loginEmail"],$_POST["loginPwd"]);
                if($result)
                    $_SESSION['tipo_usuario'] = 'ccp';
                else{
                    $result = $controller->verificaProfessor($_POST["loginEmail"],$_POST["loginPwd"]);
                    $_SESSION['tipo_usuario'] = 'professor';
                }
            }
        }

    }

require_once('View/header.php');


if(isset($_POST["CadastroAluno"])){
    require_once 'Controller/ControllerCadastro.php';
    $controller = new ControllerCadastro();
    $_SESSION['result_cad'] = $controller->cadastrarAluno("$_POST[cadastroNumUsp]", "$_POST[cadastroNome]", "$_POST[cadastroEmail]", "$_POST[cadastroSenha]","$_POST[cadastroCurriculo]","$_POST[cadastroCurso]","$_POST[cadastroCPF]");
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}

if(isset($_POST["cadastroProf"])){
    require_once 'Controller/ControllerCadastro.php';
    $controller = new ControllerCadastro();
    $_SESSION['result_cad'] = $controller->cadastrarProfessor("$_POST[cadastroCPF]", "$_POST[cadastroNome]", "$_POST[cadastroEmail]", "$_POST[cadastroSenha]");
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}

if(isset($_POST["cadastroCCP"])){
    require_once 'Controller/ControllerCadastro.php';
    $controller = new ControllerCadastro();
    $_SESSION['result_cad'] = $controller->cadastrarCCP("$_POST[cadastroCPF]");
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}






require_once('View/footer.php');
?>