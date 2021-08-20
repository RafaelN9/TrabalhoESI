<?php include_once('../view/header.php'); 

$_SESSION['tipo_usuario'] = 'aluno';
//$_SESSION['tipo_usuario'] = 'professor';
//$_SESSION['tipo_usuario'] = 'ccp';
$btn_box = '';
$search_bar = '<div></div>';
if(isset($_SESSION['tipo_usuario'])){

    if($_SESSION['tipo_usuario'] == 'aluno') 
        $btn_box = '<button class="btn-lg btn-primary p-2">Solicitar Refazer</button>';
    elseif($_SESSION['tipo_usuario'] == 'professor')
        $btn_box = '<button class="btn-lg btn-primary p-2">Atribuir Nota</button>';
    elseif($_SESSION['tipo_usuario'] == 'ccp')
        $btn_box = '<button class="btn-lg btn-primary p-2">Desligar Aluno</button>';
}else{
    //header("Location: http://localhost/trabalhoESI/view/");
}
?>

<div class="container-fluid h-100 d-flex" style="min-height: 100vh;">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 h-100">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mb-5">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control bg-warning" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                <div class="input-group-append">
                                    <button class="btn btn-warning">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <table class="table table-light rounded">
                                <thead class="thead-primary">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                            

                        </div>
                        <div class="col-md-10 justify-content-center">
                            <div class="d-flex justify-content-between">
                                <button class="btn-lg btn-primary p-2">Acessar Relatório</button>
                                <?php echo $btn_box; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once('../view/footer.php'); ?>