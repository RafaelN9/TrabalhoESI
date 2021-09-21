<?php

require_once '../DBServices/DataBaseService.php';
session_start();

$table = '';
switch ($_SESSION['tipo_usuario']){
    case 'aluno':
        $table = 'notificacaoAluno';
        break;

    case 'professor':
        $table = 'notificacaoProf';
        break;

    case 'ccp':
        $table = 'notificacaoCCP';
        break;

    default: break;
}


runSQL("UPDATE $table SET `cor` = 'secondary' WHERE `Codigo` = $_POST[codNotifica]");