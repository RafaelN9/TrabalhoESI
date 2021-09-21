<?php

require_once '../DBServices/DataBaseService.php';
session_start();

runSQL("UPDATE `notificacaoaluno` SET `cor` = 'secondary' WHERE `notificacaoaluno`.`Codigo` = $_POST[codNotifica]");