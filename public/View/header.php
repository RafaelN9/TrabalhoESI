<?php
if($_SESSION['from'] == 'preencher')
     require_once('../data_base/functions.php');
else
    require_once('data_base/functions.php');
//unset($_SESSION['tipo_usuario']);
//$_SESSION['tipo_usuario'] = 'aluno';
//$_SESSION['tipo_usuario'] = 'professor';
//$_SESSION['tipo_usuario'] = 'ccp';
//$_SESSION['tipo_usuario'] = 'erro';
$dropdown = '<div></div>';
$dropNotifica ='<div></div>';
$botaoLogin = '';
if(isset($_SESSION['tipo_usuario'])){
        $user = $_SESSION['tipo_usuario'];
        $dropNotifica = "<div class='dropdown btn' role='group' aria-label='Notifications'>
        <button class='btn btn-secondary btn-lg' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <i class='fas fa-bell' width='100' height='100'></i>
        </button>
        <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
            <button class='dropdown-item' type='button'>$user</button>
            <button class='dropdown-item' type='button'>Item 2</button>
            <button class='dropdown-item' type='button'>Item 3</button>
        </div>
        </div>";
        $botaoLogin = "
        <div class='d-flex align-items-center'>
        <a style='min-width: 35px; min-height: 35px;' href='View/logout.php' class='btn btn-danger p-2 w-100 align-content-center'>
            <i class='fas fa-sign-out-alt'></i>
        </a>
        </div>"
       ;

if($_SESSION['tipo_usuario'] == 'aluno') 
    $dropdown = '<div class="dropdown">
                <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="View/preencher.php" type="button">Preencher formulário</a>
                    <a class="dropdown-item" href="index.php?getRel=aluno" type="button">Formulários</a>
                    <button class="dropdown-item" type="button">Item 2</button>
                    <button class="dropdown-item" type="button">Item 3</button>
                </div>
            </div>';
elseif($_SESSION['tipo_usuario'] == 'professor')
    $dropdown = '<div class="dropdown">
    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <button class="dropdown-item" type="button"><a href="index.php?getRel=professor">Relatórios Pendentes</a></button>
        <button class="dropdown-item" type="button">Item 2</button>
        <button class="dropdown-item" type="button">Item 3</button>
    </div>
    </div>';
elseif($_SESSION['tipo_usuario'] == 'ccp')

    $dropdown = '<div class="dropdown">
    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <button class="dropdown-item" type="button"><a href="index.php?getRel=ccp">Relatórios Pendentes</a></button>
        <button class="dropdown-item" type="button">Item 2</button>
        <button class="dropdown-item" type="button">Item 3</button>
    </div>
    </div>';

}else  $botaoLogin = '<form action="View/login.php" class="align-self-center">
<input type="submit" class="btn-lg btn-primary btn-bg-color text-white" name="submit" value="Login">
</form>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <?php
     if($_SESSION['from'] == 'preencher')
         echo '<link rel="stylesheet" href="styles/main.css?v=<?php echo time(); >">';
     else
        echo '<link rel="stylesheet" href="View/styles/main.css?v=<?php echo time(); ?>">';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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
        <div class="bg-secundaria h-100">
        
       