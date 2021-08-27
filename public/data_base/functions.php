<?php
    session_start();
    $_SESSION["from_code"] = false;
    function runSQL($sql){
        $_SESSION["from_code"] = true;
        require('conn.inc.php');
        $result = $conn->query($sql); 
        if ($result != true) 
            $result = $conn->error;
        $conn->close();
        
        return $result;
    }
    /*
    if(isset($_SESSION["tipo_usuario"]) and $_SESSION["tipo_usuario"] === 'erro')
        unset($_SESSION["tipo_usuario"]);
    
    if(isset($_POST["login"]) && $_POST["login"] == "Entrar"){
        if(isset($_POST["loginEmail"]) && isset($_POST["loginPwd"])){
            $queryAluno = "SELECT Email FROM aluno WHERE Email = '$_POST[loginEmail]' AND Senha = MD5('$_POST[loginPwd]') LIMIT 1";
            $resultAluno = runSQL($queryAluno);
            if($rowAluno = mysqli_fetch_assoc($resultAluno)){
                $_SESSION["tipo_usuario"] = 'aluno';
                $_POST["login"] = $_POST["loginEmail"];
                header("Location: http://localhost/trabalhoESI/view/index.php");
            }else{
                $queryCCP = "SELECT Email FROM professor INNER JOIN ccp on professor.CPF = ccp.CPF_Prof WHERE Email = '$_POST[loginEmail]' AND Senha = MD5('$_POST[loginPwd]') LIMIT 1";
                $resultCCP = runSQL($queryCCP);
                if($rowCCP = mysqli_fetch_assoc($resultCCP)){
                    $_SESSION["tipo_usuario"] = 'ccp';
                    $_POST["login"] = $_POST["loginEmail"];
                    header("Location: http://localhost/trabalhoESI/view/index.php");
                }else{
                    $queryProfessor = "SELECT Email FROM Professor WHERE Email = '$_POST[loginEmail]' AND Senha = MD5('$_POST[loginPwd]') LIMIT 1";
                    $resultProfessor = runSQL($queryProfessor);
                    if($rowProfessor = mysqli_fetch_assoc($resultProfessor)){
                        $_SESSION["tipo_usuario"] = 'professor';
                        $_POST["login"] = $_POST["loginEmail"];
                        header("Location: http://localhost/trabalhoESI/view/index.php");
                    }else{
                        unset($_POST["login"]); 
                        $_SESSION["error"] = "Usuário não existe no banco :(";
                        header("Location: http://localhost/trabalhoESI/Login/login.php");
                    }
                }
            }
        }
    }

    if(isset($_POST["cadastroAluno"])){
        $query = "INSERT INTO aluno values('$_POST[cadastroNumUsp]', '$_POST[cadastroNome]','$_POST[cadastroEmail]','$_POST[cadastroSenha]','$_POST[cadastroCurriculo]','$_POST[cadastroCurso]','$_POST[cadastroCPF]')";
        $result = runSQL($query);
        $_SESSION["result_cad"] = $result;
        header("Location: http://localhost/trabalhoESI/Login/login.php");
    }

    if(isset($_POST["cadastroProf"])){
        $query = "INSERT INTO professor values('$_POST[cadastroCPF]', '$_POST[cadastroNome]','$_POST[cadastroEmail]','$_POST[cadastroSenha]')";
        $result = runSQL($query); 
        $_SESSION["result_cad"] = $result;
        header("Location: http://localhost/trabalhoESI/Login/login.php");
    }

    if(isset($_POST["cadastroCCP"])){
        $query = "INSERT INTO ccp values('$_POST[cadastroCPF]')";
        $result = runSQL($query); 
        $_SESSION["result_cad"] = $result;
        header("Location: http://localhost/trabalhoESI/Login/login.php");
    }

    

    function runQuery($query){
        $result = runSQL($query);
        if ($result != null)
            if(mysqli_num_rows($result) > 0)
                return $result;
    }    
    
    $_SESSION["from_code"] = false;*/

    function showError($divToDisplay, $errorMsg){
        echo "<script>
            var divToDisplay = document.querySelector('#$divToDisplay');
            divToDisplay.style = {display: defaultStatus}
            divToDisplay.innerText = '$errorMsg';
            setTimeout(function() {
                divToDisplay.innerText = '';
                divToDisplay.hidden = true;
            }, 5000);
        </script>";
    }