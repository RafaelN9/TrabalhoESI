<?php 
    $search_bar = ""; $tHead = []; $tBody = []; $btn_box = ""; $errorMessage = ""; $btn_solicita=''; $btn_corta='';
    $errorMessage = $_REQUEST["relatorio"]["errorMessage"];
    if($errorMessage === ""){
        $search_bar = $_REQUEST["relatorio"]["search_bar"];
        $tHead = $_REQUEST["relatorio"]["tHead"];
        $tBody = $_REQUEST["relatorio"]["tBody"];
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2">Acessar Relatório</button>';
        if($_SESSION['tipo_usuario'] == 'aluno')
            $btn_solicita = '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2">Solicitar para refazer relatório</button>';
        if($_SESSION['tipo_usuario'] == 'ccp')
            $btn_corta= '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2">Cortar aluno</button>';
        $btn_box .= $_REQUEST["relatorio"]["btn_box"];
    }elseif(count($tBody) > 0){
        $tHead = $_REQUEST["relatorio"]["tHead"];
        $tBody = $_REQUEST["relatorio"]["tBody"];
    }
?>

    <div class="container-fluid h-100 d-flex" style="min-height: 100vh;">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 h-100">
                    <div class="row justify-content-center">
                        <div class="display-4">
                            Histórico de relatórios
                        </div>
                        <div class="col-md-10 mt-3 mb-5">
                            <?php echo $search_bar; ?>
                        </div>
                        <div class="col-12 mb-5">
                            <h3><?php echo $errorMessage; ?></h3> 
                            <table class="table table-light rounded table-hover" id="tableRelatorio">
                                <thead class='thead bg-warning'>
                                    <tr>
                                    <?php
                                    foreach($tHead[0] as $name){ ?>
                                        <th> <?php echo $name ?> </th>
                                    <?php } ?>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php foreach($tBody as $row){ ?>
                                        <tr>
                                            <?php foreach($row as $key => $value){ ?>
                                            <td>
                                                <?php echo $value ?>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                <tbody>
                            </table>
                        </div>
                        <div class="col-12 justify-content-center">
                            <div class="d-flex justify-content-between flex-wrap">
                                <?php
                                    echo $btn_box;
                                    echo $btn_solicita;
                                    echo $btn_corta;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
