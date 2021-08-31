<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
if(!isset($_SESSION['tipo_usuario']))
    if(isset($_POST["login"])){
        if(isset($_POST["loginEmail"]) && isset($_POST["loginPwd"])){
            require_once('Controller/ControllerLogin.php');
            $controller = new ControllerLogin();
            $result = $controller->verificaAluno($_POST["loginEmail"],$_POST["loginPwd"]);
            if($result){
                $_SESSION['cod_usuario'] = $result;
                $_SESSION['tipo_usuario'] = 'aluno';
            }else{
                $result = $controller->verificaCCP($_POST["loginEmail"],$_POST["loginPwd"]);
                if($result){
                    $_SESSION['cod_usuario'] = $result;
                    $_SESSION['tipo_usuario'] = 'ccp';
                }else{
                    $result = $controller->verificaProfessor($_POST["loginEmail"],$_POST["loginPwd"]);
                    if($result){
                        $_SESSION['cod_usuario'] = $result;
                        $_SESSION['tipo_usuario'] = 'professor';
                    }
                }
            }
        }
    }
$_SESSION['from'] = 'index';
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

if(isset($_POST["formulario"])){
    require_once 'Controller/ControllerFormulario.php';
    $controller = new ControllerFormulario();

    $q13 = '';
    if(isset($_POST['q13']))
        $q13 = $_POST['q13'];

    $q18 = '';
    if(isset($_POST['q18']))
        $q18 = $_POST['q18'];

    $q9 = '';
    if(isset($_POST['q9']))
        $q9 = $_POST['q9'];

    $q10 = '';
    if(isset($_POST['q10']))
        $q10 = $_POST['q10'];

    $q19 = '';
    if(isset($_POST['q19']))
        $q19 = $_POST['q19'];

    $result = $controller->enviaForm($_SESSION['cod_usuario'],"$_POST[q6]","$_POST[q7]","$_POST[q8]","$q9","$q10","$_POST[q11]","$_POST[q12]","$q13","$_POST[q14]","$_POST[q15]","$_POST[q16]","$_POST[q17]","$q18","$q19","$_POST[q20]","$_POST[q21]","$_POST[q22]","$_POST[q23]","$_POST[q24]","$_POST[q25]","$_POST[q26]","$_POST[q27]","$_POST[q28]");
    echo $result;
}

if(isset($_GET["to"])){
    require_once "View/$_GET[to].php";
}

if(isset($_GET["getRel"])){
    require_once 'Controller/ControllerRelatorio.php';
    $controller = new ControllerRelatorio();
    $controller->ControllerRelatorio($_SESSION['tipo_usuario'], $_SESSION['cod_usuario']);
}


require_once('View/footer.php');