<?php include_once('../view/header.php'); 

//$_SESSION['tipo_usuario'] = 'aluno';
$_SESSION['tipo_usuario'] = 'professor';
//$_SESSION['tipo_usuario'] = 'ccp';
$btn_box = '';
$search_bar = '<div></div>';
if(isset($_SESSION['tipo_usuario'])){

    if($_SESSION['tipo_usuario'] == 'aluno') 
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2">Solicitar Refazer</button>';
    elseif($_SESSION['tipo_usuario'] == 'professor'){
        $search_bar =   '<div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Procure por um Nome, RA ou CPF">
                            <div class="input-group-append">
                                <button class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>';
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2">Atribuir Nota</button>';
    }elseif($_SESSION['tipo_usuario'] == 'ccp')
        $search_bar =   '<div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Procure por um Nome, RA ou CPF">
                            <div class="input-group-append">
                                <button class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>';
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2">Desligar Aluno</button>';
}else{
    //header("Location: http://localhost/trabalhoESI/view/");
}
?>

    <div class="container-fluid h-100 d-flex" style="min-height: 100vh;">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 h-100">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mt-3 mb-5">
                            <?php echo $search_bar; ?>
                        </div>
                        <div class="col-12 mb-5">
                            <table class="table table-light rounded table-hover" id="tableRelatorio">
                                <thead class="thead bg-warning">
                                    <tr class="">
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
                        <div class="col-12 justify-content-center">
                            <div class="d-flex justify-content-between flex-wrap">
                                <button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2">Acessar Relatório</button>
                                <?php echo $btn_box; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>

<?php include_once('../view/footer.php'); ?>