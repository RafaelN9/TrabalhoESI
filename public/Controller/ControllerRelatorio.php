<?php
require_once 'data_base/GetRelatorios.php';

class ControllerRelatorio{
    private $search_bar;
    private $tHead;
    private $tBody;
    private $btn_box;

    

    function ControllerRelatorio($tipo_usuario, $cpf){
        function GetRelatoriosP($cpfProf){
            $bd = new GetRelatorios();
            $response = $bd->GetRelatoriosPendentesProfessor("", $cpfProf);
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        function GetRelatoriosC($cpfCCP){
            $bd = new GetRelatorios();
            $response = $bd->GetRelatoriosPendentesCCP("", $cpfCCP);
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        function GetRelatoriosA($cpfAluno){
            $bd = new GetRelatorios();
            $response = $bd->GetRelatoriosPendentesAluno("", $cpfAluno);
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        $column = array();
        switch ($tipo_usuario) {
            case 'aluno':
                # code...
                break;
            /*case 'ccp':
                # code...
                break;*/
            case 'ccp':
                $column = GetRelatoriosP($cpf);
                if(gettype($column) == "string"){
                    $_REQUEST["errorMessage"] = $column;
                    require_once 'View/relatorios_pendentes.php';
                    return;
                }
                
                $this->tHead[] = array_values($column);
                foreach($column as $row){
                    $this->tBody[] = $row;
                }
                // $filter = " and (('$filter' = aluno.CPF) 
                //     or ('$filter' = professor.CPF) 
                //     or ('$filter' = aluno.Numero_USP) 
                //     or (UPPER(aluno.Nome) LIKE '%$filter%')
                //     or (UPPER(professor.Nome) LIKE '%$filter%')) ";
                break;
            default:
                # code...
                break;
        }
        print_r($this->tHead);
        print_r($this->tBody);
        /*
        $_REQUEST["errorMessage"] = '';
        $_REQUEST["search_bar"]= $this->search_bar;
        $_REQUEST["tHead"]= $this->tHead;
        $_REQUEST["tBody"]= $this->tBody;
        $_REQUEST["btn_box"]= $this->btn_box;
        require_once 'View/relatorios_pendentes.php';*/
        return;
    }
}

/*

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
   
}
$result = runQuery($queryWithFilter);
if($result != null){
    createTable($result);
}else{
    echo "No results found";
    createTable(runQuery($query));
}

*/