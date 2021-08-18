<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid bg-secundaria" style="height: 100vh;">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center p-5 justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-4 bg-princ-escuro h-100 rounded">
                    <div class="d-flex justify-content-center h-100 pb-5 pt-5 align-items-center">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>