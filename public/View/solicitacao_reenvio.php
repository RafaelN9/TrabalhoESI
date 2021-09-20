<?php
$search_bar = "";
$tHead = [[]];
$tBody = [];
$btn_box = "";
$errorMessage = "";
$btn_refazer = '';
$errorMessage = $_REQUEST["relatorio"]["errorMessage"];
if ($errorMessage === "") {
    $search_bar = $_REQUEST["relatorio"]["search_bar"];
    $tHead = $_REQUEST["relatorio"]["tHead"];
    $tBody = $_REQUEST["relatorio"]["tBody"];
    $btn_box = '<button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2" onclick="acessarRelatorio()">Acessar Relatório</button>';
    $btn_refazer = '<button class="btn btn-lg btn-primary pl-3 pr-3 p-2 mb-2" id="buttonRefazer" onclick="aceitarRefazer()">Aceitar Solicitação</button>';
    $btn_box .= $_REQUEST["relatorio"]["btn_box"];
} else {
    $errorMessage = "<h3 class='mt-5 mb-5 text-center'>" . $errorMessage . "</h3>";
}

?>


<div class="container-fluid h-100 d-flex">
    <div class="container-fluid ">
        <div class="row h-100 p-md-5 justify-content-center">
            <div class="col-sm-12 col-md-10 h-100">
                <div class="row justify-content-center">
                    <div class="display-4">
                        Solicitações de reenvio do relatório
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

                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-12 justify-content-center">
                        <div class="d-flex justify-content-between flex-wrap">
                            <?php
                            echo $btn_box;
                            echo $btn_refazer;
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