<?php
    session_start();
    unset($_SESSION["tipo_usuario"]);
    header("Location: http://localhost/trabalhoESI/view/index.php");
