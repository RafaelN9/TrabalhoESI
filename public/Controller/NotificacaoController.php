<?php
require_once 'Model/Notificacao.php';
require_once 'DBServices/insertBD.php';

class NotificacaoController
{
    private $notifications = [];
    private $numNotifications = 0;
    private $notificationsContent = "<p class='p-5 mx-auto my-auto'>Sem notificações</p>";

    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    function __construct0(){}

    function __construct1($notificacoes){
        $this->notifications = $notificacoes;

        function addNotification(Notificacao $notification, $index){
            global $numNotifications;
            $numNotifications++;
            $notificaLink = $notification->getLink();
            $notificaTexto = $notification->getTexto();
            $notificaData = $notification->getData();
            $cor = 'alert-'.$notification->getCor();
            return "
                <div class='d-flex flex-colunm dropdown-item $cor' id='$index'>
                    <div class='dropdown-item px-0 text-wrap'  onclick='Redireciona(`$notificaLink`)' > $notificaTexto
                        <br>
                        <span class='text-muted' style='font-size: 12px;'>$notificaData</span>
                    </div>
                    <button type='button' class='close pr-1' data-dismiss='alert' aria-label='Close' onclick='deleteNotify($index)'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";

        }

        if($this->notifications != "erro"){
            $this->notificationsContent = '';
            foreach($this->notifications as $elem){
                $notif = new Notificacao($elem['usuario'], $elem["texto"], $elem["link"], $elem['cor']);
                $notif->setCodigo($elem['codigo']);
                $notif->setData($elem['data']);
                $this->notificationsContent .= addNotification($notif, $elem['codigo']);
            }
        }
    }

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

    function getNotificationsContent(){
        return $this->notificationsContent;
    }
    function getNumNotifications(){
        return $this->numNotifications;
    }
    

}