<?php include_once('../view/simple_header.php'); ?>

    <div class="container-fluid h-100 d-flex align-items-center">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-5 bg-princ-escuro h-100 rounded">
                    <div class="d-flex justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                        <form class="w-100" method="POST" action="../data_base/functions.php">
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroNome"   placeholder="Nome" required>
                            <input type="email" class="form-control mb-4 p-4" name="cadastroEmail"  aria-describedby="emailHelp" placeholder="Email" required>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroCPF"    placeholder="CPF" required>
                            <input type="password" class="form-control mb-4 p-4" name="cadastroSenha" aria-describedby="pwdHelp" placeholder="Senha" required>
                            <input type="submit" class="btn btn-primary p-3 float-right" name="cadastro" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include_once('../view/footer.php');?>