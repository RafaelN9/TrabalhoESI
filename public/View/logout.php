<?php
    session_start();
    $_SESSION = array();
    $_POST = array();
    $_REQUEST = array();
    header("Location: ../index.php");
