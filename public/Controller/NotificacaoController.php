<?php
require_once 'Model/Notificacao.php';
require_once 'DBServices/insertBD.php';

class NotificacaoController
{

    public function adicionaNotificacaoAluno($usuario, $texto, $link , $cor){
        $notificacao = new Notificacao($usuario, $texto, $link, $cor);
        $bd = new insertBD();
        $resultado = $bd->insereNotificacaoAluno($notificacao);
        return $resultado;
    }

    public function adicionaNotificacaoProfessor($usuario, $texto, $link, $cor){
        $notificacao = new Notificacao($usuario, $texto, $link, $cor);
        $bd = new insertBD();
        $resultado = $bd->insereNotificacaoProfessor($notificacao);
        return $resultado;
    }

    public function adicionaNotificacaoCCP($usuario, $texto, $link, $cor){
        $notificacao = new Notificacao($usuario, $texto, $link, $cor);
        $bd = new insertBD();
        $resultado = $bd->insereNotificacaoCCP($notificacao);
        return $resultado;
    }

    function getNotificacoesAluno($usuario){
        require_once 'DBServices/NotificacoesService.php';
        $bd = new NotificacoesService();
        $resultado = $bd->getNotificacaoAluno($usuario);
        return $resultado;
    } 
    function getNotificacoesProfessor($usuario){
        require_once 'DBServices/NotificacoesService.php';
        $bd = new NotificacoesService();
        $resultado = $bd->getNotificacaoProfessor($usuario);
        return $resultado;
    } 
    function getNotificacoesCCP($usuario){
        require_once 'DBServices/NotificacoesService.php';
        $bd = new NotificacoesService();
        $resultado = $bd->getNotificacaoCCP($usuario);
        return $resultado;
    }

    //function 
}