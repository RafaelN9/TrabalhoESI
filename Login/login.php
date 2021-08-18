<!doctype html>
<html lang="en">

<head>
    <title>
        Login
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/main.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid bg-secundaria" style="height: 100vh;">
        <div class="d-flex justify-content-center align-self-center">
            <div class="card w-50" style="margin-top: 15%; ">
                <div class="card-body border border-secondary bg-princ-escuro">
                    <form>
                        <div class="form-group">
                            <label for="loginEmail" class="text-white">Email</label>
                            <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="exemplo@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="loginPwd" class="text-white">Senha</label>
                            <input type="password" class="form-control" id="loginPwd" placeholder="********">
                        </div>
                        
                        <button type="submit" class="btn btn-primary float-right">Entrar</button>
                        <a href="../Cadastro/cadastro.php" class="text-white">Cadastrar-se</a>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>