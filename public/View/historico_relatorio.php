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
        $btn_cortar = '<button class="btn btn-lg btn-primary pl-3 pr-3 p-2 mb-2" id="buttonCortar" style="display: none;" onclick="cortarAluno()">Cortar aluno</button>';
    $btn_box .= $_REQUEST["relatorio"]["btn_box"];
    $possivelCortar = $_REQUEST["relatorio"]["possivelCortar"];
    
    $possivelCortar = json_encode($possivelCortar);
    echo "<script>
        var possivelCortarList = $possivelCortar;
    </script>";
    
} else {
    $errorMessage = "<h3 class='mt-5 mb-5 text-center'>" . $errorMessage . "</h3>";
}

$_SESSION['from'] = 'historico';
?>


<div class="container-fluid h-100 d-flex">
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
                                        foreach ($tBody as $row) { ?>
                                            <tr id="linha<?php echo $row[1]; ?>" onclick="Marcar('<?php echo $row[1]; ?>')">
                                                <td>
                                                    <input type="radio" onclick="Marcar('<?php echo $row[1]; ?>')" name="relatorio" id="elem<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>" />
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
                                    <?php } ?>
                                    <tbody>
                                </table>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 justify-content-center">
                        <div class="d-flex justify-content-between flex-wrap">
                        <?php
                            echo $btn_box;
                            echo $btn_cortar;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="View/scripts/scriptRelPendente.js?<?php echo time(); ?>"></script>
<script type="text/javascript" src="View/scripts/scriptSearchBox.js?<?php echo time(); ?>"></script>