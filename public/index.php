<?php
$classe = $_GET['c'];
$metodo = $_GET['a'];

//$classe = 'controller';
//$metodo = 'listar';

require_once 'Controller/'.$classe.'.php';

$obj = new $classe();

if(isset($_POST["CadastroAluno"])){
    $_REQUEST['result_cad'] = $obj->$metodo("$_POST[cadastroNumUsp]", "$_POST[cadastroNome]", "$_POST[cadastroEmail]", "$_POST[cadastroSenha]","$_POST[cadastroCurriculo]","$_POST[cadastroCurso]","$_POST[cadastroCPF]");
    require_once 'View/login.php';
}

?>