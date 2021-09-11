<?php
require_once 'Model/Notificacao.php';
require_once 'data_base/insertBD.php';

class ControllerNotificacao
{

    public function adicionaNotificacaoAluno($usuario, $texto, $link){
        $notificacao = new Notificacao($usuario, $texto, $link);
        $bd = new insertBD();
        $resultado = $bd->insereNotificacaoAluno($notificacao);
        return $resultado;
    }

    public function adicionaNotificacaoProfessor($usuario, $texto, $link){
        $notificacao = new Notificacao($usuario, $texto, $link);
        $bd = new insertBD();
        $resultado = $bd->insereNotificacaoProfessor($notificacao);
        return $resultado;
    }

    public function adicionaNotificacaoCCP($usuario, $texto, $link){
        $notificacao = new Notificacao($usuario, $texto, $link);
        $bd = new insertBD();
        $resultado = $bd->insereNotificacaoCCP($notificacao);
        return $resultado;
    }

    function getNotificacoesAluno($usuario){
        require_once 'data_base/GetNotificacoes.php';
        $bd = new GetNotificacoes();
        $resultado = $bd->GetNotificacaoAluno($usuario);
        return $resultado;
    } 
    function getNotificacoesProfessor($usuario){
        require_once 'data_base/GetNotificacoes.php';
        $bd = new GetNotificacoes();
        $resultado = $bd->GetNotificacaoProfessor($usuario);
        return $resultado;
    } 
    function getNotificacoesCCP($usuario){
        require_once 'data_base/GetNotificacoes.php';
        $bd = new GetNotificacoes();
        $resultado = $bd->GetNotificacaoCCP($usuario);
        return $resultado;
    } 
}