<?php
require_once 'data_base/functions.php';
require_once 'Model/Notificacao.php';

class GetNotificacoes{
    function GetNotificacaoAluno($n_usp){
        $query = "SELECT `nUSP`, `texto`, `link` FROM `notificacaoaluno` WHERE `nUSP` = '$n_usp' ORDER BY Codigo ASC;";
        $notificacoes = [];
        $result = runSQL($query);
        while($row = mysqli_fetch_assoc($result)){
            $notificacoes[] = ["codigo" => $row['nUSP'], "texto" => $row['texto'], "link" => $row['link']];
        }
        if(empty($notificacoes)){
            return "erro";
        }
        return $notificacoes;
    }
    function GetNotificacaoProfessor($cpf){
        $query = "SELECT `Codigo`, `CPF`, `texto`, `link` FROM `notificacaoprof` WHERE `CPF` = '$cpf' ORDER BY Codigo ASC";
        $notificacoes = [];
        $result = runSQL($query);
        while($row = mysqli_fetch_assoc($result)){
            $notificacoes[] = ["codigo" => $row['nUSP'], "texto" => $row['texto'], "link" => $row['link']];
        }
        if(empty($notificacoes)){
            return "erro";
        }
        return $notificacoes;
    }
    function GetNotificacaoCCP($cpf){
        $query = "SELECT `Codigo`, `CPF`, `texto`, `link` FROM `notificacaoccp` WHERE `CPF` = '$cpf' ORDER BY Codigo ASC";
        $notificacoes = [];
        $result = runSQL($query);
        while($row = mysqli_fetch_assoc($result)){
            $notificacoes[] = ["codigo" => $row['nUSP'], "texto" => $row['texto'], "link" => $row['link']];
        }
        if(empty($notificacoes)){
            return "erro";
        }
        return $notificacoes;
    }
}