<?php
require_once 'data_base/GetRelatorios.php';

class ControllerRelatorio{
    private $search_bar = "";
    private $errorMessage = "";
    private $tHead;
    private $tBody;
    private $btn_box = "";

    

    function ControllerRelatorio($tipo_usuario, $cpf){
        function GetRelatoriosP($cpfProf){
            $bd = new GetRelatorios();
            $response = $bd->GetRelatoriosPendentesProfessor("", $cpfProf);
            if(gettype($response) == "string"){
                return $response;
            }
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        function GetRelatoriosC($cpfCCP){
            $bd = new GetRelatorios();
            $response = $bd->GetRelatoriosPendentesCCP("", $cpfCCP);
            if(gettype($response) == "string"){
                return $response;
            }
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        function GetRelatoriosA($cpfAluno){
            $bd = new GetRelatorios();
            $response = $bd->GetRelatoriosPendentesAluno("", $cpfAluno);
            if(gettype($response) == "string"){
                return $response;
            }
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }

        function throwError($dbResponse){
            if(gettype($dbResponse) == "string"){
                $_REQUEST["relatorio"]["errorMessage"] = $dbResponse;
                if(isset($_SESSION["prevRel"])){
                    if($_SESSION["prevRel"]){
                        $_REQUEST["relatorio"] = $_SESSION["relatorio"];
                        $_SESSION["prevRel"] = false;
                    }
                } 
                require_once 'View/relatorios_pendentes.php';
                return true;
            }
            return false;
        }

        $relatorio = array();
        switch ($tipo_usuario) {
            case 'aluno':
                $relatorio = GetRelatoriosA($cpf);

                if (throwError($relatorio)){
                    $this->errorMessage = $relatorio;
                    $this->tHead = [];
                    $this->tBody = [];
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }

                break;
            case 'professor':
                $relatorio = GetRelatoriosP($cpf);
                if (throwError($relatorio)){
                    $this->errorMessage = $relatorio;
                    $this->tHead = [];
                    $this->tBody = [];
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }
                break;
            case 'ccp':
                $relatorio = GetRelatoriosC($cpf);
                if (throwError($relatorio)){
                    $this->errorMessage = $relatorio;
                    $this->tHead = [];
                    $this->tBody = [];
                    break;               
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }
                break;
            default:
                header("Location: http://localhost/trabalhoESI/public");
                break;
        }
        
        $response = ["errorMessage" => $this->errorMessage, "search_bar" => $this->search_bar,
            "tHead" => $this->tHead, "tBody" => $this->tBody, "btn_box" => $this->btn_box];
        
        $_REQUEST["relatorio"] = $response;

        $_SESSION["prevRel"] = true;
        $_SESSION["relatorio"] = $response;
        require_once 'View/relatorios_pendentes.php';
        return;
    }

    function HistoricoRelatorios($tipo_usuario, $cpf){
        function GetRelatoriosP($cpfProf){
            $bd = new GetRelatorios();
            $response = $bd->GetHistoricoProfessor("", $cpfProf);
            if(gettype($response) == "string"){
                return $response;
            }
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        function GetRelatoriosC($cpfCCP){
            $bd = new GetRelatorios();
            $response = $bd->GetHistoricoCCP("", $cpfCCP);
            if(gettype($response) == "string"){
                return $response;
            }
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }
        function GetRelatoriosA($cpfAluno){
            $bd = new GetRelatorios();
            $response = $bd->GetHistoricoAluno("", $cpfAluno);
            if(gettype($response) == "string"){
                return $response;
            }
            if(count($response) == 0){
                return "Empty response";
            }
            return $response;
        }

        function throwError($dbResponse){
            if(gettype($dbResponse) == "string"){
                $_REQUEST["relatorio"]["errorMessage"] = $dbResponse;
                if(isset($_SESSION["prevRel"])){
                    if($_SESSION["prevRel"]){
                        $_REQUEST["relatorio"] = $_SESSION["relatorio"];
                        $_SESSION["prevRel"] = false;
                    }
                }
                require_once 'View/historico_relatorio.php';
                return true;
            }
            return false;
        }

        $relatorio = array();
        switch ($tipo_usuario) {
            case 'aluno':
                $relatorio = GetRelatoriosA($cpf);

                if (throwError($relatorio)){
                    $this->errorMessage = $relatorio;
                    $this->tHead = [];
                    $this->tBody = [];
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }

                break;
            case 'professor':
                $relatorio = GetRelatoriosP($cpf);
                if (throwError($relatorio)){
                    $this->errorMessage = $relatorio;
                    $this->tHead = [];
                    $this->tBody = [];
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }
                break;
            case 'ccp':
                $relatorio = GetRelatoriosC($cpf);
                if (throwError($relatorio)){
                    $this->errorMessage = $relatorio;
                    $this->tHead = [];
                    $this->tBody = [];
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }
                break;
            default:
                header("Location: http://localhost/trabalhoESI/public");
                break;
        }

        $response = ["errorMessage" => $this->errorMessage, "search_bar" => $this->search_bar,
            "tHead" => $this->tHead, "tBody" => $this->tBody, "btn_box" => $this->btn_box];

        $_REQUEST["relatorio"] = $response;

        $_SESSION["prevRel"] = true;
        $_SESSION["relatorio"] = $response;
        require_once 'View/historico_relatorio.php';
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