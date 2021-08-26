<?php
$classe = $_GET['class'];
$metodo = $_GET['acao'];

//$classe = 'controller';
//$metodo = 'listar';

require_once 'Controller/'.$classe.'.php';

$obj = new PessoaController();
$obj->$metodo();
?>