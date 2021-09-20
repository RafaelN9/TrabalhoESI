<?php
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>';
date_default_timezone_set('America/Sao_Paulo');
session_start();
if(!isset($_SESSION['tipo_usuario'])){
    if(isset($_POST["login"])) if(isset($_POST["loginEmail"]) && isset($_POST["loginPwd"])){
        require_once('Controller/LoginController.php');
        $controller = new LoginController();
        $result = $controller->verificaAluno($_POST["loginEmail"],$_POST["loginPwd"]);
        if($result){
            $_SESSION['cod_usuario'] = $result;
            $_SESSION['tipo_usuario'] = 'aluno';
            
            require_once 'Controller/NotificacaoController.php';
            $controllerNotifica = new NotificacaoController;
            $_SESSION['notificacoes'] = $controllerNotifica->getNotificacoesAluno($_SESSION['numero_USP']);

            unset($_POST);
            header("Location: http://localhost/trabalhoESI/public/index.php");
        }else{
            $result = $controller->verificaCCP($_POST["loginEmail"],$_POST["loginPwd"]);
            if($result){
                $_SESSION['cod_usuario'] = $result;
                $_SESSION['tipo_usuario'] = 'ccp';

                require_once 'Controller/NotificacaoController.php';
                $controllerNotifica = new NotificacaoController;
                $_SESSION['notificacoes'] = $controllerNotifica->getNotificacoesCCP($_SESSION['cod_usuario']);
                unset($_POST);
                header("Location: http://localhost/trabalhoESI/public/index.php");
            }else{
                $result = $controller->verificaProfessor($_POST["loginEmail"],$_POST["loginPwd"]);
                if($result){
                    $_SESSION['cod_usuario'] = $result;
                    $_SESSION['tipo_usuario'] = 'professor';

                    require_once 'Controller/NotificacaoController.php';
                    $controllerNotifica = new NotificacaoController;
                    $_SESSION['notificacoes'] = $controllerNotifica->getNotificacoesProfessor($_SESSION['cod_usuario']);

                    unset($_POST);
                    header("Location: http://localhost/trabalhoESI/public/index.php");
                }else
                    header("Location: http://localhost/trabalhoESI/public/View/login.php?erroLogin=S");
            }
        }
    }
}

require_once('Controller/HeaderController.php');
new HeaderController(isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null, isset($_SESSION['notificacoes']) ? $_SESSION['notificacoes'] : null);

if(isset($_POST["cadastroAluno"])){
    require_once 'Controller/CadastroController.php';
    $controller = new CadastroController();
    $_SESSION['result_cad'] = $controller->cadastrarAluno("$_POST[cadastroNumUsp]", "$_POST[cadastroNome]", "$_POST[cadastroEmail]", "$_POST[cadastroSenha]","$_POST[cadastroCurriculo]","$_POST[cadastroCurso]","$_POST[cadastroCPF]");
    $controller->cadastrarProfResp("$_POST[profResp]","$_POST[cadastroNumUsp]");
    unset($_POST);
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}

if(isset($_POST["cadastroProf"])){
    require_once 'Controller/CadastroController.php';
    $controller = new CadastroController();
    $_SESSION['result_cad'] = $controller->cadastrarProfessor("$_POST[cadastroCPF]", "$_POST[cadastroNome]", "$_POST[cadastroEmail]", "$_POST[cadastroSenha]");
    unset($_POST);
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}

if(isset($_POST["cadastroCCP"])){
    require_once 'Controller/CadastroController.php';
    $controller = new CadastroController();
    $_SESSION['result_cad'] = $controller->cadastrarCCP("$_POST[cadastroCPF]");
    unset($_POST);
    header("Location: http://localhost/trabalhoESI/public/View/login.php");
}

if(isset($_POST["formulario"])){
    require_once 'Controller/FormularioController.php';
    $controller = new FormularioController();

    $q13 = '';
    if(isset($_POST['q13']))
        $q13 = $_POST['q13'];

    $q18 = '';
    if(isset($_POST['q18']))
        $q18 = $_POST['q18'];

    $q9 = '';
    if(isset($_POST['q9']))
        $q9 = $_POST['q9'];

    $q10 = '';
    if(isset($_POST['q10']))
        $q10 = $_POST['q10'];

    $q19 = '';
    if(isset($_POST['q19']))
        $q19 = $_POST['q19'];

    $result = $controller->enviaForm($_SESSION['cod_usuario'],"$_POST[q6]","$_POST[q7]","$_POST[q8]","$q9","$q10","$_POST[q11]","$_POST[q12]","$q13","$_POST[q14]","$_POST[q15]","$_POST[q16]","$_POST[q17]","$q18","$q19","$_POST[q20]","$_POST[q21]","$_POST[q22]","$_POST[q23]","$_POST[q24]","$_POST[q25]","$_POST[q26]","$_POST[q27]");
    if($result == 1){
        require_once 'Controller/GetController.php';
        $controllerGet = new GetController();
        $dados = $controllerGet->getProfFromAluno($_SESSION['cod_usuario']);

        if($dados == 'erro')
        echo
        '<script>
                    setTimeout(()=>{
                        Swal.fire({
                            title:"Erro no envio!",
                            text: "Ninguem foi notificado!", 
                            confirmButtonText: "OK"
                        }).then((result) => {
                          if (result.isConfirmed)
                            window.location.href = "http://localhost/trabalhoESI/public/index.php";
                        })
                    }, 100)
                </script>';
        else{
            require_once 'Controller/NotificacaoController.php';
            $controllNotifica = new NotificacaoController();
            $result = $controllNotifica->adicionaNotificacaoProfessor($dados[0], 'Formulário enviado pelo aluno '.$_SESSION['nome'], 'index.php?revisao_relatorio='.$dados[1], "warning");
            echo
            '<script>
                setTimeout(()=>{
                Swal.fire({
                        title:"Relatorio enviado!",
                        text: "O responsavel foi notificiado!", 
                        confirmButtonText: "OK"
                    }).then((result) => {
                    if (result.isConfirmed)
                        window.location.href = "http://localhost/trabalhoESI/public/index.php";
                })
                }, 100)
            </script>';


        }

    }

    unset($_POST);
    //header("Location: http://localhost/trabalhoESI/public/index.php");
}

if(isset($_GET["revisao_relatorio"])){
    require_once 'Controller/RevisaoRelatorioController.php';
    $controller = new RevisaoRelatorioController();
    $result = $controller->adquireRelatorioFromDB($_GET["revisao_relatorio"]);
}

if(isset($_POST["avaliacaoProfessor"])){
    require_once 'Controller/RevisaoRelatorioController.php';
    $controller = new RevisaoRelatorioController();
    $result = $controller->insereAvalicaoDoProfessorNaDB($_POST['nota'], $_POST['parecer'], $_POST['codigo_form']);
    if($result == 1){
        require_once 'Controller/GetController.php';
        $controllerGet = new GetController();
        $cpf = $controllerGet->getCCP();
        if(empty($cpf))
        echo
        '<script>
                    setTimeout(()=>{
                        Swal.fire({
                            title:"Erro no envio!",
                            text: "Ninguem foi notificado!", 
                            confirmButtonText: "OK"
                        }).then((result) => {
                          if (result.isConfirmed)
                            window.location.href = "http://localhost/trabalhoESI/public/index.php";
                        })
                    }, 100)
                </script>';
        else{
            require_once 'Controller/NotificacaoController.php';
            $controllNotifica = new NotificacaoController();
            foreach ($cpf as $value){
                $controllNotifica->adicionaNotificacaoCCP($value, 'Nota atribuida ao formulário '.$_POST['codigo_form'], 'index.php?revisao_relatorio='.$_POST['codigo_form'], "success");
            }
            echo
            '<script>
                    setTimeout(()=>{
                        Swal.fire({
                            title:"Avaliacao enviada!",
                            text: "O responsavel foi notificiado!", 
                            confirmButtonText: "OK"
                        }).then((result) => {
                          if (result.isConfirmed)
                            window.location.href = "http://localhost/trabalhoESI/public/index.php";
                        })
                    }, 100)
                </script>';
        }

    }else{
        echo "<script>setTimeout(()=>{alert(`ERROR : $result`)}, 150)</script>";
    }
    unset($_POST);
}

if(isset($_POST["avaliacaoCCP"])){

    require_once 'Controller/RevisaoRelatorioController.php';
    $controller = new RevisaoRelatorioController();
    $result = $controller->insereAvalicaoDoCCPNaDB($_POST['nota'], $_POST['parecer'], $_POST['codigo_form'], $_POST['cpf_ccp']);
    if($result == 1){
        require_once 'Controller/GetController.php';
        $controllerGet = new GetController();
        $nUSP = $controllerGet->getAlunoFormulario($_POST['codigo_form']);
        if(empty($nUSP))
            echo
            '<script>
                    setTimeout(()=>{
                        Swal.fire({
                            title:"Erro no envio!",
                            text: "Ninguem foi notificado!", 
                            confirmButtonText: "OK"
                        }).then((result) => {
                          if (result.isConfirmed)
                            window.location.href = "http://localhost/trabalhoESI/public/index.php";
                        })
                    }, 100)
                </script>';
        else{
            require_once 'Controller/NotificacaoController.php';
            $controllNotifica = new NotificacaoController();
            $controllNotifica->adicionaNotificacaoAluno($nUSP, 'Nota atribuida ao formulário '.$_POST['codigo_form'], 'index.php?revisao_relatorio='.$_POST['codigo_form'], "success");
            echo
            '<script>
                setTimeout(()=>{
                    Swal.fire({
                        title:"Avaliacao enviada!",
                        text: "O aluno foi notificiado!", 
                        confirmButtonText: "OK"
                    }).then((result) => {
                      if (result.isConfirmed)
                        window.location.href = "http://localhost/trabalhoESI/public/index.php";
                    })
                }, 100)
            </script>';
        }
    }else{
        echo "<script>setTimeout(()=>{alert(`ERROR : $result`)}, 150)</script>";
    }
    unset($_POST);
}

if(isset($_GET["to"])){
    require_once "View/$_GET[to].php";
}

if(isset($_GET["getRel"])){
    require_once 'Controller/RelatorioController.php';
    $controller = new RelatorioController;
    if($_GET["getRel"] == "historico"){
        $controller->HistoricoRelatorios($_SESSION['tipo_usuario'], $_SESSION['cod_usuario']);
    }elseif($_GET["getRel"] == "pendente"){
        $controller->RelatoriosPendentes($_SESSION['tipo_usuario'], $_SESSION['cod_usuario']);
    }
}    

if(isset($_GET["refazer"])){
    require_once 'Controller/RefazerRelatorioController.php';
    $controller = new RefazerRelatorioController();
    $result = $controller->solicitaRefazer($_GET["refazer"]);
    if($result == 1){
        require_once 'Controller/GetController.php';
        $controllerGet = new GetController();
        $cpf = $controllerGet->getCCP();
        if(empty($cpf))
            echo
            '<script>
                setTimeout(()=>{
                    Swal.fire({
                        title:"Erro na solicitação!",
                        text: "Tente novamente, ou contate um responsavel!", 
                        confirmButtonText: "OK"
                    }).then((result) => {
                      if (result.isConfirmed)
                        window.location.href = "http://localhost/trabalhoESI/public/index.php";
                    })
                }, 100)
            </script>';
        else{
            require_once 'Controller/NotificacaoController.php';
            $controllNotifica = new NotificacaoController();
            foreach ($cpf as $value) {
                $controllNotifica->adicionaNotificacaoCCP($value, 'Aluno '.$_SESSION['nome'].' solicitou para refazer o formulario '.$_GET["refazer"], 'index.php?revisao_relatorio='.$_GET["refazer"], "warning");
            }
            echo
            '<script>
                setTimeout(()=>{
                    Swal.fire({
                        title:"Solicitação enviada!",
                        text: "O CCP foi notificiado!", 
                        confirmButtonText: "OK"
                    }).then((result) => {
                      if (result.isConfirmed)
                        window.location.href = "http://localhost/trabalhoESI/public/index.php";
                    })
                }, 100)
            </script>';
        }
    }else echo "<h1 class='text-center text-danger'>$result</h1>";
}

if(isset($_GET["cortar"])){
    require_once 'Controller/AlunoEstadoController.php';
    $controller = new AlunoEstadoController();
    $result = $controller->desliga($_GET["cortar"]);
    if($result == 1){
        $nUSP = $_GET["cortar"];
        require_once 'Controller/NotificacaoController.php';
        $controllNotifica = new NotificacaoController();
        $controllNotifica->adicionaNotificacaoAluno($nUSP, 'Você foi desligado do programa', '', "danger");
        echo
        '<script>
            setTimeout(()=>{
                Swal.fire({
                    title:"Aluno desligado com sucesso!",
                    text: "O mesmo foi notificiado!", 
                    confirmButtonText: "OK"
                }).then((result) => {
                  if (result.isConfirmed)
                    window.location.href = "http://localhost/trabalhoESI/public/index.php?getRel=historico";
                })
            }, 100)
        </script>';
    }else echo "<h1 class='text-center text-danger'>$result</h1>";
}

require_once('View/footer.php');