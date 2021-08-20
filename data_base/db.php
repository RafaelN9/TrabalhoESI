<?php
    if(!isset($_GET['email']) and !isset($_SESSION['login'])){
        header("Location: http://localhost/trabalhoESI/view/");
    }