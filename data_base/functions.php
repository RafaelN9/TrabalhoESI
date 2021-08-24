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

    function runQuery($query){
        $result = runSQL($query);
        if ($result != null)
            if(mysqli_num_rows($result) > 0)
                return $result;
    }    
    
    $_SESSION["from_code"] = false;