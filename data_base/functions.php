<?php
    if(!isset($_POST['submit']) and !isset($_SESSION['login'])){
        header("Location: http://localhost/trabalhoESI/view/");
    }