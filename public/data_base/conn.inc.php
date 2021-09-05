<?php
    if(!isset($_SESSION["from_code"]) and $_SESSION["from_code"]){
        header("Location: http://localhost/trabalhoESI/view/");
    }
    $dbServername = "localhost";
    $dbUsername = "id17541912_admin";
    $dbPassword = "3x&?p0VLsuBj2xKT";
    $dbName = "id17541912_sistema_de_avaliacao";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);