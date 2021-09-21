<?php
    session_start();
    unset($_SESSION["tipo_usuario"]);
    header("Location: ../index.php");
