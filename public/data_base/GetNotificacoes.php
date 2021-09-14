<?php
require_once 'data_base/functions.php';
require_once 'Model/Notificacao.php';

class GetNotificacoes{
    function GetNotificacaoAluno($n_usp){
        $query = "SELECT * FROM `notificacaoaluno` WHERE `nUSP` = '$n_usp' ORDER BY Codigo ASC;";
        $notificacoes = [];
        $result = runSQL($query);
        while($row = mysqli_fetch_assoc($result)){
            $notificacoes[] = ["codigo"=> $row['Codigo'], "usuario" => $row['nUSP'], "texto" => $row['texto'], "link" => $row['link'], "data" => $row['data'], "cor" => $row['cor']];
        }
        if(empty($notificacoes)){
            return "erro";
        }
        return $notificacoes;
    }
    function GetNotificacaoProfessor($cpf){
        $query = "SELECT * FROM `notificacaoprof` WHERE `CPF` = '$cpf' ORDER BY Codigo ASC";
        $notificacoes = [];
        $result = runSQL($query);
        while($row = mysqli_fetch_assoc($result)){
            $notificacoes[] = ["codigo"=> $row['Codigo'], "usuario" => $row['CPF'], "texto" => $row['texto'], "link" => $row['link'], "data" => $row['data'], "cor" => $row['cor']];
        }
        if(empty($notificacoes)){
            return "erro";
        }
        return $notificacoes;
    }
    function GetNotificacaoCCP($cpf){
        $query = "SELECT * FROM `notificacaoccp` WHERE `CPF` = '$cpf' ORDER BY Codigo ASC";
        $notificacoes = [];
        $result = runSQL($query);
        while($row = mysqli_fetch_assoc($result)){
            $notificacoes[] = ["codigo"=> $row['Codigo'], "usuario" => $row['CPF'], "texto" => $row['texto'], "link" => $row['link'], "data" => $row['data'], "cor" => $row['cor']];
        }
        if(empty($notificacoes)){
            return "erro";
        }
        return $notificacoes;
    }
}