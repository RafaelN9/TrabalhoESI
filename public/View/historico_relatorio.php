<?php
$search_bar = "";
$tHead = [[]];
$tBody = [];
$btn_box = "";
$errorMessage = "";
$btn_cortar = '';
$errorMessage = $_REQUEST["relatorio"]["errorMessage"];
$showSearchBox = $_SESSION['tipo_usuario'] == 'aluno' ? 'd-none' : '';
if ($errorMessage === "") {
    $search_bar = $_REQUEST["relatorio"]["search_bar"];
    $tHead = $_REQUEST["relatorio"]["tHead"];
    $tBody = $_REQUEST["relatorio"]["tBody"];
    $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2" onclick="acessarRelatorio()">Acessar Relatório</button>';
    if ($_SESSION['tipo_usuario'] == 'aluno')
        $btn_box .= '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2" onclick="solicitarRefazer()">Solicitar refazer relatório</button>';
    if ($_SESSION['tipo_usuario'] == 'ccp')
        $btn_cortar = '<button class="btn btn-lg btn-primary pl-3 pr-3 p-2 mb-2" onclick="cortarAluno()">Cortar aluno</button>';
    $btn_box .= $_REQUEST["relatorio"]["btn_box"];
    $possivelCortar = $_REQUEST["relatorio"]["possivelCortar"];
    if($possivelCortar != []){
        $possivelCortar = json_encode($possivelCortar);
        echo "<script>
            let possivelCortarList = $possivelCortar;
        </script>";
    }
    
} else {
    $errorMessage = "<h3 class='mt-5 mb-5 text-center'>" . $errorMessage . "</h3>";
}

$_SESSION['from'] = 'historico';
?>


<div class="container-fluid h-100 d-flex" style="min-height: 100vh;">
    <div class="container-fluid ">
        <div class="row h-100 p-md-5 justify-content-center">

            <div class="col-sm-12 col-md-10 h-100">
                <div class="row justify-content-center">
                    <div class="display-4">
                        Histórico de relatórios
                    </div>
                    <div class="col-md-10 d-flex justify-content-center" >
                        <?php echo $search_bar; ?>
                        
                    </div>                   

                    <div class="col-12 mb-5">
                        <?php if ($errorMessage != "") {
                            echo $errorMessage;
                        } else {
                        ?>
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-light disable-select table-hover" id="tableRelatorio">
                                    <thead class='thead bg-warning'>
                                        <tr id='head'>
                                            <th></th>
                                            <?php
                                            foreach ($tHead[0] as $name) { ?>

                                                <th> <?php echo $name ?> </th>
                                            <?php } ?>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
                                        $possivelCortar = [];
                                        //$aux = ['', ''];

                                        foreach ($tBody as $row) { ?>
                                            <tr id="linha<?php echo $row[1]; ?>" onclick="Marcar('<?php echo $row[1]; ?>')">
                                                <td>
                                                    <input type="radio" onclick="Marcar('<?php echo $row[1]; ?>')" name="relatorio" id="<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>" />
                                                </td>
                                                <?php foreach ($row as $key => $value) { ?>
                                                    <td>
                                                        <?php
                                                        if ($value == "INSATISFATÓRIO")
                                                            echo "<span class='text-danger'>$value</span>";
                                                        else echo $value; ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php
                                        /*
                                        if($aux[0] == $row[0] && $aux[1] == $row[5])
                                            $possivelCortar[$row[1]] = $row[0];
                                        $aux = [$row[0], $row[5]];
                                        */

                                        }
                                        ?>
                                    <tbody>
                                </table>
                            <?php
                                //  $possivelCortar = array_unique($possivelCortar);
                            }
                            ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 justify-content-center">
                        <div class="d-flex justify-content-between flex-wrap">
                            <?php
                            echo $btn_box;
                            ?>
                        </div>
                    </div>

                    <?php
                            if (!empty($possivelCortar)) {
                    ?>
                        <div class="col-6 mb-5 mt-5">
                            <h2>Possível desligar alunos do programa</h2>
                            <table class="table table-light disable-select rounded table-hover mt-5" id="tableCortar">
                                <thead class='thead bg-warning'>
                                    <tr>
                                        <th></th>
                                        <th>
                                            Aluno
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    foreach ($possivelCortar as $key => $value) { ?>
                                        <tr id="cortar<?php echo $key; ?>" onclick="MarcarCortar('<?php echo $key; ?>')">
                                            <td>
                                                <input type="radio" name="cortar" onclick="MarcarCortar('<?php echo $key; ?>')" id="c_<?php echo $key; ?>" value="<?php echo $key; ?>" />
                                            </td>
                                            <td>
                                                <?php echo $value ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="col-12 justify-content-center">
                                <div class="d-flex justify-content-between flex-wrap">
                                    <?php
                                    echo $btn_cortar;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="View/scripts/scriptRelPendente.js?<?php echo time(); ?>"></script>
<script type="text/javascript" src="View/scripts/scriptSearchBox.js?<?php echo time(); ?>"></script>