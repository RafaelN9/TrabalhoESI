<?php
include_once('../view/simple_header.php');
?>


<div class="container-fluid h-100 pt-5 d-flex align-items-center">
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center">

            <div class="col-sm-12 col-md-10 col-lg-6 col-xl-4 bg-princ-escuro h-100 rounded">
                <?php
                if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'erro')
                    echo "<h3>Email e/ou senha incorretos</h3>";
                ?>
                <div class="d-flex justify-content-center h-100 pb-5 pt-5 align-items-center p-2">

                    <form style="width: 80%;" action="../data_base/functions.php" method="POST">
                        <div class="form-group">
                            <label for="loginEmail" class="text-white">Email</label>
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" placeholder="exemplo@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPwd" class="text-white">Senha</label>
                            <input type="password" class="form-control" id="loginPwd" name="loginPwd" placeholder="********" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="submit" value="Entrar" name="login" class="btn btn-primary">
                            <a href="../Cadastro/cadastro.php" class="text-white">Cadastrar-se</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../view/footer.php');
?>