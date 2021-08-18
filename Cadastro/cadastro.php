<?php
include_once('../view/header.php');
?>

    <div class="container-fluid bg-secundaria" style="height: 90%;">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center p-5 justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-4 bg-princ-escuro h-100 rounded">
                    <div class="d-flex justify-content-center h-100 align-items-center">
                        <form style="width: 80%;" action="db.php">
                            
                            <input type="text" class="form-control mb-3 p-4" name="cadastroNome" placeholder="Nome" required>
                            <input type="email" class="form-control mb-3 p-4" name="cadastroEmail" aria-describedby="emailHelp" placeholder="Email" required>
                            <input type="text" class="form-control mb-3 p-4" name="cadastroCPF" placeholder="CPF" required>
                            <input type="password" class="form-control mb-3 p-4" name="cadastroSenha" aria-describedby="pwdHelp" placeholder="Senha" required>
                            <input type="button" class="btn btn-primary p-3 float-right" name="submit" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
include_once('../view/footer.php');
?>