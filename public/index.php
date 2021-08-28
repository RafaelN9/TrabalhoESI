<?php

if(isset($_POST["login"])){
    if(isset($_POST["loginEmail"]) && isset($_POST["loginPwd"])){
        require_once('Controller/ControllerLogin.php');
        $controller = new ControllerLogin();
        $result = $controller->verificaAluno($_POST["loginEmail"],$_POST["loginPwd"]);
        if(!$result)
            $result = $controller->verificaCCP($_POST["loginEmail"],$_POST["loginPwd"]);
            if(!$result)
                $result = $controller->verificaProfessor($_POST["loginEmail"],$_POST["loginPwd"]);
    }
}

require_once('View/header.php');


if(isset($_POST["CadastroAluno"])){
    require_once 'Controller/ControllerCadastro.php';
    $controller = new ControllerCadastro();
    $_SESSION['result_cad'] = $controller->cadastrarAluno("$_POST[cadastroNumUsp]", "$_POST[cadastroNome]", "$_POST[cadastroEmail]", "$_POST[cadastroSenha]","$_POST[cadastroCurriculo]","$_POST[cadastroCurso]","$_POST[cadastroCPF]");
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}






require_once('View/footer.php');
?>