<?php

require_once '../DBServices/DataBaseService.php';
session_start();
$table = '';
switch ($_SESSION['tipo_usuario']){
    case 'aluno':
        $table = 'notificacaoAluno';
        break;

    case 'professor':
        $table = 'notificacaoProfessor';
        break;

    case 'ccp':
        $table = 'notificacaoCCP';
        break;

    default: break;
}

echo runSQL("DELETE FROM $table WHERE Codigo = $_POST[notify]");

