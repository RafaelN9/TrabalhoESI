<?php
require_once('data_base/functions.php');
require_once 'Model/Notificacao.php';


$dropdown = '<div></div>';
$dropNotifica = '<div></div>';
$botaoLogin = '';

if (isset($_SESSION['tipo_usuario'])) {
    $user = $_SESSION['tipo_usuario'];
    $dropNotifica = "<div class='dropdown btn' role='group' aria-label='Notifications'>
        <button class='btn btn-secondary btn-lg' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' onClick='toggleDisplayNotifications()'>
            <i class='fas fa-bell' width='100' height='100'></i>
        </button>
        </div>";
    $botaoLogin = "
        <div class='d-flex align-items-center'>
        <a style='min-width: 35px; min-height: 35px;' href='View/logout.php' class='btn btn-danger p-2 w-100 align-content-center'>
            <i class='fas fa-sign-out-alt'></i>
        </a>
        </div>";

    if ($_SESSION['tipo_usuario'] == 'aluno')
        $dropdown = '<div class="dropdown">
                <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="index.php?to=preencher" type="button">Preencher formulário</a>
                    <a class="dropdown-item" href="index.php?getRel=historico" type="button">Histórico de relatórios</a>
                </div>
            </div>';
    elseif ($_SESSION['tipo_usuario'] == 'professor')
        $dropdown = '<div class="dropdown">
    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <a class="dropdown-item" href="index.php?getRel=pendente">Relatórios Pendentes</a>
        <a class="dropdown-item" href="index.php?getRel=historico">Histórico de relatórios</a>
    </div>
    </div>';
    elseif ($_SESSION['tipo_usuario'] == 'ccp')

        $dropdown = '<div class="dropdown">
    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <a class="dropdown-item" href="index.php?getRel=pendente">Relatórios Pendentes</a>
        <a class="dropdown-item" href="index.php?getRel=historico">Histórico de relatórios</a>
    </div>
    </div>';
} else  $botaoLogin = '<form action="View/login.php" class="align-self-center">
<input type="submit" class="btn-lg btn-primary btn-bg-color text-white" name="submit" value="Login">
</form>';

//-------------- Sistema de Notificações ------------------

$notifications = [];
abstract class Colors{
    const Danger = 'alert-danger';
    const Success = 'alert-success';
    const Warning = 'alert-warning';
}


function addNotification(Notificacao $notification, $index){
    $link = "";
    $notificaLink = $notification->getLink();
    $notificaTexto = $notification->getTexto();
    if($notificaLink != '')
        $link = "<a href='$notificaLink'> Acesse esse link </a>";
    return "<div class='dropdown-item' id='$index'> $notificaTexto
          $link
        <button type='button' class='close' data-dismiss='alert' aria-label='Close' onclick='deleteNotify($index)'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
}

//$emptyPlaceholder = "<p class='text-white p-5 mx-auto my-auto'>Sem notificações</p>";

$notificationsContent = "<p class='p-5 mx-auto my-auto'>Sem notificações</p>";

$notifications = $_SESSION['notificacoes'];

if($notifications != "erro"){
    $notificationsContent = '';
    foreach($notifications as $elem){
        $notif = new Notificacao($elem['codigo'], $elem["texto"], $elem["link"], Colors::Warning); 
        $notificationsContent .= addNotification($notif, $elem['codigo']);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="View/styles/main.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="View/scripts/scriptNotify.js?v=<?php echo time(); ?>"></script>
    <title></title>
</head>

<body>
    <div class="container-fluid bg-img p-0" style="min-height: 100vh">

        <nav class="navbar navbar-light bg-princ-escuro sticky-top">
            <?php
            echo $dropdown;
            ?>
            <a class="navbar-brand brand-pos" href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/4b/Webysther_20160310_-_Logo_USP.svg" width="106" height="auto" class="rounded mx-auto d-block" alt="">
            </a>
            <div class="float-right d-flex">
                <?php
                    echo $dropNotifica;
                    echo $botaoLogin;
                ?>
            </div>
        </nav>

        <div class="container-fluid" style="display: none;" id="notificationsCard">
            <div class="row justify-content-end p-3">
                <div class="col-sm-12 col-md-4 p-0">
                    <div class="card">
                        <div class="card-header">
                            Notificações
                            <button type="button" class="close" aria-label="Close" onclick="dismissNotificationCard()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body p-0 py-2">
                            <div class="d-flex flex-column" id="notifications">
                                <?php echo $notificationsContent ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-secundaria h-100">