<?php 
    $tHead = [[]]; $tBody = []; $errorMessage = ""; $btn_box = ""; $showSearchBox = "";
    $errorMessage = $_REQUEST["relatorio"]["errorMessage"];
    if($errorMessage === "") {
        $search_bar = $_REQUEST["relatorio"]["search_bar"];
        $tHead = $_REQUEST["relatorio"]["tHead"][0];
        $tBody = $_REQUEST["relatorio"]["tBody"];
        $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2" onclick="acessarRelatorio()">Acessar Relatório</button>';
        $btn_box .= $_REQUEST["relatorio"]["btn_box"];
    }else{
        $errorMessage = "<h3 class='mt-5 mb-5 text-center'>" .$errorMessage. "</h3>";
        $showSearchBox = "d-none";
    }

    $_SESSION['from'] = 'pendente';
?>

    <div class="container-fluid h-100 d-flex" style="min-height: 100vh;">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 h-100">
                    <div class="row justify-content-center">
                        <div class="display-4">
                            Relatórios Pendentes
                        </div>
                        <?php
                        switch ($_SESSION['tipo_usuario']) {
                            case 'ccp':
                                echo "<input type='text' class='form-control col-md-10 mt-5 mb-5 $showSearchBox' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno ou nome do professor'/>";
                                break;
                            case 'professor':
                                echo "<input type='text' class='form-control col-md-10 mt-5 mb-5 $showSearchBox' id='search-box' name='search-box' placeholder='Buscar pelo nome do aluno'>";
                                break;
                            default:
                                break;
                        }                            
                        ?>
                        <div class="col-12 mb-5">
                            <?php if($errorMessage != ""){ echo $errorMessage; }
                            else{
                            ?>
                            <table class="table table-light disable-select rounded table-hover" id="tableRelatorio">
                                <thead class='thead bg-warning'>
                                    <tr id='head'>
                                        <th></th>
                                        <?php
                                        foreach($tHead as $name){ ?>
                                            <th> <?php echo $name ?> </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tBody as $row){ 
                                        $codigo = $row[1];   ?>
                                        <tr id="linha<?php echo $codigo; ?>" onclick="Marcar('<?php echo $codigo; ?>')">
                                            <td>
                                                <input type="radio" onclick="Marcar('<?php echo $codigo; ?>')" name="relatorio" id="<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>"/>
                                            </td>
                                            <?php foreach($row as $key => $value){ ?>
                                            <td>
                                                <?php echo $value ?>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                <tbody>
                            </table>
                            <?php } ?>
                        </div>
                        <div class="col-12 justify-content-center">
                            <div class="d-flex justify-content-between flex-wrap">
                                <?php echo $btn_box; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="View/scripts/scriptRelPendente.js?<?php echo time(); ?>"></script>
<script type="text/javascript" src="View/scripts/scriptSearchBox.js?<?php echo time(); ?>"></script>
