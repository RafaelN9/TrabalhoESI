<?php
include_once('simple_header.php');


if (isset($_SESSION['result_cad'])){
    if($_SESSION['result_cad'] == 1)
        echo '<script type="text/javascript">
            setTimeout(function() {
            alert("Cadastrado com sucesso");
            }, 100);</script>';
    else
        echo '<script type="text/javascript">
            setTimeout(function() {
            alert("'.$_SESSION['result_cad'].'");
            }, 100);</script>';
    unset($_SESSION['result_cad']);
}




?>

    <script type="text/javascript" src="scripts/jquery.mask.js"></script>

<div class="container-fluid h-100 pt-5 d-flex align-items-center">
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center">

            <div class="col-sm-12 col-md-10 col-lg-6 col-xl-4 bg-princ-escuro h-100 rounded">
                <h3 id="throwError" class="m-4" style="display: none;"></h3>
               
                <div class="d-flex justify-content-center h-100 pb-5 pt-5 align-items-center p-2">

                    <form style="width: 80%;" action="../index.php" method="POST">
                        <h4 class="form-group text-danger" id="error" style="transition-duration: 1s";>
                            <?php
                                require_once ('../data_base/functions.php');
                                if(isset($_GET['erroLogin'])){
                                    showError('error', 'Usuário e/ou senha incorretos');
                                }
                            ?>

                        </h4>
                        <div class="form-group">
                            <label for="loginEmail" class="text-white">Email</label>
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" placeholder="exemplo@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPwd" class="text-white">Senha</label>
                            <input type="password" class="form-control" id="loginPwd" name="loginPwd" minlength="8" maxlength="16" placeholder="********" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Entrar" name="login" class="btn btn-primary">
                            <a href="cadastro.php" class="text-white">Cadastrar-se</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let options = {
        translation: {
            E: { pattern: /[\w@\-.+]/, recursive: true },
            A: { pattern: /[\w@\-.+]/, optional: false },
            S: { pattern: /[\w@\-.+]/, optional: true },
        },
    };

    $("#loginEmail").mask("E", options);
    $("#loginPwd").mask("AAAAAAAASSSSSSSS", options);

</script>

<?php
include_once('footer.php');
?>