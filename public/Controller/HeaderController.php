<?php


require_once 'DBServices/DataBaseService.php';
require_once 'Controller/NotificacaoController.php';
require_once 'Model/Notificacao.php';


class HeaderController{
    private $dropdown = '<div></div>';
    private $dropNotifica = '';
    private $botaoLogin = '';

    function __construct($tipoUsuario, $notificacoes){
        $this->botaoLogin = "
            <div class='d-flex align-items-center'>
                <a style='min-width: 35px; min-height: 35px;' href='View/logout.php' class='btn btn-danger p-2 w-100 align-content-center'>
                    <i class='fas fa-sign-out-alt'></i>
                </a>
            </div>";

        switch ($tipoUsuario) {
            case 'aluno':
                $this->dropdown = '
                <div class="dropdown">
                    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="index.php?to=preencher_relatorio" type="button">Preencher formulário</a>
                        <a class="dropdown-item" href="index.php?getRel=historico" type="button">Histórico de relatórios</a>
                    </div>
                </div>';
                break;
            case 'professor':
                $this->dropdown = '
                <div class="dropdown">
                    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="index.php?getRel=pendente">Relatórios Pendentes</a>
                        <a class="dropdown-item" href="index.php?getRel=historico">Histórico de relatórios</a>
                    </div>
                </div>';
                break;
            case 'ccp':
                $this->dropdown = '
                <div class="dropdown">
                    <button class="btn btn-primary btn-lg btn-bg-color" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="index.php?getRel=pendente">Relatórios Pendentes</a>
                        <a class="dropdown-item" href="index.php?getRel=historico">Histórico de relatórios</a>
                    </div>
                </div>';
                break;
            default:
                $this->botaoLogin = '
                <form action="View/login.php" class="my-auto">
                    <input type="submit" class="btn-lg btn-primary btn-bg-color text-white" name="submit" value="Login">
                </form>';
                $this->dropNotifica = '<div></div>';
                break;
        }

        if($this->dropNotifica == ''){
            $notificaController = new MostraNotificaController($notificacoes);
            $numNotifica = $notificaController->getNumNotifications();
            $notificaContent = $notificaController->getNotificationsContent();
            $numNotificaContent = $numNotifica > 0 ? "<div class='rounded-circle bg-danger mt-1 ml-1' style='width: 20px; height: 20px; font-size: 12px;'>$numNotifica</div>" :
                '';
            $this->dropNotifica = "
            <div class='dropdown mr-2' role='group' aria-label='Notifications'>
                <button class='btn btn-secondary btn-lg d-flex' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-bell' width='100' height='100'></i>
                    $numNotificaContent
                </button>
                <div class='dropdown-menu dropdown-menu-right dropdown-menu-notify p-0' aria-labelledby='dropdownMenu2'>
                    <div class='card'>
                        <div class='card-header text-center'>
                            Notificações
                        </div>
                        <div class='card-body p-0'>
                            <div class='d-flex flex-column' id='notifications'>
                                $notificaContent
                            </div>
                        </div>
                    </div>
                </div>
            </div> ";
        }

        $response = ['dropdown'=> $this->dropdown, 'dropNotifica' => $this->dropNotifica, 'botaoLogin' => $this->botaoLogin];
        $_REQUEST['request'] = $response;
        require_once 'View/header.php';
        return;
    }
}


