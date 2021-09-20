<?php
    $response = $_REQUEST['request'];
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

        <nav class="navbar navbar-light bg-princ-escuro sticky-top py-3">
            <?php
            echo $response['dropdown'];
            ?>
            <a class="navbar-brand brand-pos" href="index.php" >
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/4b/Webysther_20160310_-_Logo_USP.svg" width="106" height="auto" class="rounded mx-auto d-block" alt="">
            </a>
            <div class="float-right d-flex">
                <?php
                    echo $response['dropNotifica'];
                    echo $response['botaoLogin'];
                ?>
            </div>
        </nav>

        <div class="bg-secundaria h-100 pb-5" style="overflow: auto;">