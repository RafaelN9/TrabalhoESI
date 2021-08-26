<?php
    if(!isset($_SESSION["from_code"]) and $_SESSION["from_code"]){
        header("Location: http://localhost/trabalhoESI/view/");
    }
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "sistema_de_avaliacao";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);