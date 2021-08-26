<?php include_once('../view/header.php'); 

function createFilter(){
    if(isset($_POST["filter"])){
        if($_POST["filSearch"] != ""){
            $filter = strtoupper($_POST["filSearch"]);
            return " and (('$filter' = aluno.CPF) 
                or ('$filter' = professor.CPF) 
                or ('$filter' = aluno.Numero_USP) 
                or (UPPER(aluno.Nome) LIKE '%$filter%')
                or (UPPER(professor.Nome) LIKE '%$filter%')) ";
        }
    }
    return "";
}

$btn_box = '';
$search_bar = '<div></div>';
$query = '';
$filter = createFilter();

if(isset($_SESSION['tipo_usuario'])){

    if($_SESSION['tipo_usuario'] == 'aluno') 
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2">Solicitar Refazer</button>';
    elseif($_SESSION['tipo_usuario'] == 'professor'){
        $search_bar ='<form action="relatorios_pendentes.php" method="POST">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div> 
                              <input type="text" class="form-control" name="filSearch" placeholder="Procure por um Nome, RA ou CPF">
                              <div class="input-group-append">
                                <input type="submit" class="btn border-dark" value="Filtrar" name="filter">
                              </div>
                        </div></form>';
        $queryWithFilter = "SELECT 
                    aluno.Nome, 
                    formularioenviado.Cod_Formulario, 
                    professor.Nome as 'Nome Professor',
                    formularioenviado.Data
                FROM 
                    aluno, 
                    professor, 
                    formularioenviado,
                    formulario, 
                    professorresp 
                WHERE 
                    (formularioenviado.Numero_USP = aluno.Numero_USP) and 
                    (formularioenviado.Numero_USP = professorresp.Numero_USP) and 
                    (professorresp.CPF_Prof = professor.CPF) $filter
                group by formularioenviado.Numero_USP, formularioenviado.Cod_Formulario";
        $query = "SELECT 
                    aluno.Nome, 
                    formularioenviado.Cod_Formulario, 
                    professor.Nome as 'Nome Professor',
                    formularioenviado.Data
                FROM 
                    aluno, 
                    professor, 
                    formularioenviado,
                    formulario, 
                    professorresp 
                WHERE 
                    (formularioenviado.Numero_USP = aluno.Numero_USP) and 
                    (formularioenviado.Numero_USP = professorresp.Numero_USP) and 
                    (professorresp.CPF_Prof = professor.CPF)
                group by formularioenviado.Numero_USP, formularioenviado.Cod_Formulario";
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2">Atribuir Nota</button>';
        #echo $queryWithFilter;
    }elseif($_SESSION['tipo_usuario'] == 'ccp'){
        $search_bar =   '<div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Procure por um Nome, RA ou CPF">
                            <div class="input-group-append">
                                <button class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>';
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2">Desligar Aluno</button>';
    }
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
                            <?php 
                                function createHead($headers){
                                    $tableElems = "";
                                    foreach ($headers as $name) {
                                        $tableElems .= "<th scope='col'>$name</th>";
                                    }
                                    return $tableElems; 
                                }
                                function createBody($bodyElems, $max_size){
                                    $tableElems = "";
                                    $counter = 0;
                                    foreach ($bodyElems as $name) {
                                        if($counter == 0)
                                            $tableElems .= "<tr> ";
                                        if($counter % $max_size  == 0)
                                            $tableElems .= "</tr><tr> ";
                                        $tableElems .= "<td>$name</td>";
                                        if($counter == count($bodyElems))
                                            $tableElems .= "</tr> ";
                                        $counter++;
                                    }
                                    return $tableElems; 
                                }

                                function createTable($result){
                                    $Headers = array();
                                    $bodyElems = array();
                                    if($row = mysqli_fetch_assoc($result))
                                        foreach ($row as $colName => $value) {
                                            $Headers[] = $colName;
                                            $bodyElems[] = $value;
                                        }
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                        foreach ($row as $key => $value) {
                                            $bodyElems[] = $value;
                                        }
                                    $tableElems = createHead($Headers);
                                    $tHead = "<thead class='thead bg-warning'>
                                                <tr>
                                                $tableElems
                                                </tr>
                                            </thead>
                                            <tbody>";
                                    echo $tHead;
                                    $tableElems = createBody($bodyElems, count($Headers));
                                    echo $tableElems;
                                }
                                $result = runQuery($queryWithFilter);
                                if($result != null){
                                    createTable($result);
                                }else{
                                    echo "No results found";
                                    createTable(runQuery($query));
                                    
                                }
                                
                            ?>
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