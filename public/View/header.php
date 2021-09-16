<?php
require_once('DBServices/DataBaseService.php');
require_once 'Model/Notificacao.php';


$dropdown = '<div></div>';
$dropNotifica = '<div></div>';
$botaoLogin = '';

if (isset($_SESSION['tipo_usuario'])) {
    $user = $_SESSION['tipo_usuario'];
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
                    <a class="dropdown-item" href="index.php?to=preencher_relatorio" type="button">Preencher formulário</a>
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
$numNotifications = 0;

function addNotification(Notificacao $notification, $index){
    global $numNotifications;
    $numNotifications++;
    $notificaLink = $notification->getLink();
    $notificaTexto = $notification->getTexto();
    $notificaData = $notification->getData();
    $cor = 'alert-'.$notification->getCor();
    return "<div class='d-flex flex-colunm dropdown-item $cor' id='$index'>
<div class='dropdown-item px-0'  onclick='Redireciona(`$notificaLink`)'> $notificaTexto
        
        <br>
        <span class='text-muted' style='font-size: 12px;'>$notificaData</span>
    </div>
    <button type='button' class='close pr-1' data-dismiss='alert' aria-label='Close' onclick='deleteNotify($index)'>
            <span aria-hidden='true'>&times;</span>
     </button>
     </div>";

}

$notificationsContent = "<p class='p-5 mx-auto my-auto'>Sem notificações</p>";

if(isset($_SESSION['notificacoes'])) {
    $notifications = $_SESSION['notificacoes'];
}

if($notifications != "erro"){
    $notificationsContent = '';
    foreach($notifications as $elem){
        $notif = new Notificacao($elem['usuario'], $elem["texto"], $elem["link"], $elem['cor']);
        $notif->setCodigo($elem['codigo']);
        $notif->setData($elem['data']);
        $notificationsContent .= addNotification($notif, $elem['codigo']);
    }
}


if (isset($_SESSION['tipo_usuario'])){
    $dropNotifica = "<div class='dropdown mr-2' role='group' aria-label='Notifications'>
                <button class='btn btn-secondary btn-lg d-flex' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-bell' width='100' height='100'></i>
                    <div class='rounded-circle bg-danger mt-1 ml-1' style='width: 20px; height: 20px; font-size: 12px;'>$numNotifications</div>
                    </button>
                    <div class='dropdown-menu dropdown-menu-right dropdown-menu-notify p-0' aria-labelledby='dropdownMenu2'>
                    <div class='card'>
                        <div class='card-header text-center'>
                            Notificações
                        </div>
                        <div class='card-body p-0'>
                            <div class='d-flex flex-column' id='notifications'>
                                $notificationsContent
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    
        ";
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
    <title>Sistema PPgSI</title>
</head>

<body>
    <div class="container-fluid bg-img p-0" style="overflow: auto;">

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

        <div class="bg-secundaria h-100 pb-5" style="overflow: auto;">