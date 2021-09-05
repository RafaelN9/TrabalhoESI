<?php
require_once 'data_base/GetRelatorios.php';

class ControllerRelatorio{
    private $search_bar = "";
    private $errorMessage = "";
    private $tHead;
    private $tBody;
    private $btn_box = "";
    private $errorMsgTxt = "Nenhum relatório encontrado";

    function GetRelatoriosP($cpfProf){
        $bd = new GetRelatorios();
        $response = $bd->GetRelatoriosPendentesProfessor("", $cpfProf);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
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
            //var_dump($response);
            //exit();
            return $this->errorMsgTxt;
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
                break;
            default:
                header("Location: http://localhost/trabalhoESI/public");
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
        $bd = new GetRelatorios();
        $response = $bd->GetHistoricoProfessor("", $cpfProf);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }
    function GetRelatoriosHistoricoC($cpfCCP){
        $bd = new GetRelatorios();
        $response = $bd->GetHistoricoCCP("", $cpfCCP);
        if(gettype($response) == "string"){
            return $response;
        }
        if(count($response) == 0){
            return $this->errorMsgTxt;
        }
        return $response;
    }
    function GetRelatoriosHistoricoA($cpfAluno){
        $bd = new GetRelatorios();
        $response = $bd->GetHistoricoAluno("", $cpfAluno);
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
                break;
            case 'ccp':
                $relatorio = $this->GetRelatoriosHistoricoC($cpf);
                if ($this->throwErrorHistorico($relatorio)){
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
        require_once 'View/historico_relatorio.php';
        return;
    }
}