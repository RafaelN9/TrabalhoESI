<?php
    session_start();
    unset($_SESSION["tipo_usuario"]);
    header("Location: http://localhost/trabalhoESI/public/index.php");
