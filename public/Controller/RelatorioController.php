<?php
require_once 'DBServices/RelatoriosService.php';

class RelatorioController{
    private $search_bar = "";
    private $errorMessage = "";
    private $tHead;
    private $tBody;
    private $btn_box = "";
    private $errorMsgTxt = "Nenhum relatório encontrado";
    private $possivelCortar = [];

    function GetRelatoriosP($cpfProf){
        $bd = new RelatoriosService();
        $response = $bd->getRelatoriosPendentesProfessor("", $cpfProf);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }
    function GetRelatoriosC($cpfCCP){
        $bd = new RelatoriosService();
        $response = $bd->getRelatoriosPendentesCCP("", $cpfCCP);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }

    function throwError($dbResponse){
        if(gettype($dbResponse) == "string"){
            $_REQUEST["relatorio"]["errorMessage"] = $dbResponse;
            require_once 'View/relatorios_pendentes.php';
            $this->errorMessage = $dbResponse;
            $this->tHead = [];
            $this->tBody = [];
            return true;
        }
        return false;
    }

    function RelatoriosPendentes($tipo_usuario, $cpf){
        
        $relatorio = array();
        switch ($tipo_usuario) {
            case 'professor':
                $relatorio = $this->GetRelatoriosP($cpf);
                if ($this->throwError($relatorio)){
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }

                $this->search_bar = "<input type='text' class='form-control' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno'>";
                break;
            case 'ccp':
                $relatorio = $this->GetRelatoriosC($cpf);
                if ($this->throwError($relatorio)){
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }

                $this->search_bar = "<input type='text' class='form-control' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno ou nome do professor'/>";
                break;
            default:
                header("Location: index.php");
                break;
        }
        
        $response = ["errorMessage" => $this->errorMessage, "search_bar" => $this->search_bar,
            "tHead" => $this->tHead, "tBody" => $this->tBody, "btn_box" => $this->btn_box];
        
        $_REQUEST["relatorio"] = $response;
        require_once 'View/relatorios_pendentes.php';
        return;
    }

    /* HISTORICO */

    function GetRelatoriosHistoricoP($cpfProf){
        $bd = new RelatoriosService();
        $response = $bd->getHistoricoRelatoriosProfessor("", $cpfProf);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }
    function GetRelatoriosHistoricoC($cpfCCP){
        $bd = new RelatoriosService();
        $response = $bd->getHistoricoRelatoriosCCP("", $cpfCCP);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }
    function GetRelatoriosHistoricoA($cpfAluno){
        $bd = new RelatoriosService();
        $response = $bd->getHistoricoRelatoriosAluno("", $cpfAluno);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }

    function throwErrorHistorico($dbResponse){
        if(gettype($dbResponse) == "string"){
            $_REQUEST["relatorio"]["errorMessage"] = $dbResponse;
            require_once 'View/historico_relatorio.php';
            $this->errorMessage = $dbResponse;
            $this->tHead = [];
            $this->tBody = [];
            return true;
        }
        return false;
    }

    function HistoricoRelatorios($tipo_usuario, $cpf){

        $relatorio = array();
        switch ($tipo_usuario) {
            case 'aluno':
                $relatorio = $this->GetRelatoriosHistoricoA($cpf);

                if ($this->throwErrorHistorico($relatorio)){
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }

                break;
            case 'professor':
                $relatorio = $this->GetRelatoriosHistoricoP($cpf);
                if ($this->throwErrorHistorico($relatorio)){
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }

                $this->search_bar = "<input type='text' class='form-control' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno'>";
                break;
            case 'ccp':
                $relatorio = $this->GetRelatoriosHistoricoC($cpf);
                if ($this->throwErrorHistorico($relatorio)){
                    break;
                }
                $this->tHead[] = $relatorio["head"];
                $alunoAnterior = ["", ""];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                    if($alunoAnterior[0] == $row[0] && $alunoAnterior[1] == $row[5] && $alunoAnterior[1] == "INSATISFATÓRIO")
                        $this->possivelCortar[] = $row[0];
                    $alunoAnterior = [$row[0], $row[5]];
                }

                $this->search_bar = 
                            "<div class='input-group'>
                                <input type='text' class='form-control' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno ou nome do professor'/>
                                <div class='input-group-append align-self-center' style='height: min-content;'>
                                    <div class='input-group-text'>
                                        <input type='checkbox' id='searchBarAppendDesliga' class='mr-3'>
                                        <label for='searchBarAppendDesliga' class='m-0 disable-select'>Alunos a cancelar</label>
                                    </div>
                                </div>
                            </div>";
                break;
            default:
                header("Location: index.php");
                break;
        }

        $response = ["errorMessage" => $this->errorMessage, "search_bar" => $this->search_bar,
            "tHead" => $this->tHead, "tBody" => $this->tBody, "btn_box" => $this->btn_box, "possivelCortar" => $this->possivelCortar];

        $_REQUEST["relatorio"] = $response;
        require_once 'View/historico_relatorio.php';
        return;
    }

    /* Solicitações para refazer o relatório */

    function GetRelatoriosRefazer(){
        $bd = new RelatoriosService();
        $response = $bd->getRelaroriosRefazer("");
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }

    function throwErrorRefazer($dbResponse){
        if(gettype($dbResponse) == "string"){
            $_REQUEST["relatorio"]["errorMessage"] = $dbResponse;
            require_once 'View/solicitacao_reenvio.php';
            $this->errorMessage = $dbResponse;
            $this->tHead = [];
            $this->tBody = [];
            return true;
        }
        return false;
    }

    function SolicitaRefazerRelatorios(){

        $relatorio = array();

                $relatorio = $this->GetRelatoriosRefazer();
                if (!$this->throwErrorRefazer($relatorio)){

                $this->tHead[] = $relatorio["head"];
                foreach($relatorio["body"] as $row){
                    $this->tBody[] = $row;
                }
                $this->search_bar =
                    "<div class='input-group'>
                                <input type='text' class='form-control' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno ou nome do professor'/>
                                <div class='input-group-append align-self-center' style='height: min-content;'>
                                    <div class='input-group-text d-none'>
                                        <input type='checkbox' id='searchBarAppendDesliga' class='mr-3'>
                                        <label for='searchBarAppendDesliga' class='m-0 disable-select'>Alunos a cancelar</label>
                                    </div>
                                </div>
                            </div>";


        $response = ["errorMessage" => $this->errorMessage, "search_bar" => $this->search_bar,
            "tHead" => $this->tHead, "tBody" => $this->tBody, "btn_box" => $this->btn_box];

        $_REQUEST["relatorio"] = $response;
        require_once 'View/solicitacao_reenvio.php';
                }
    }
}