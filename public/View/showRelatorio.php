<?php
    
?>

<div class="container-fluid h-100 d-flex" style="min-height: 100vh;">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 h-100">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mt-3 mb-5">
                            <?php echo $search_bar; ?>
                        </div>
                        <div class="col-12 mb-5">
                            <h3><?php echo $errorMessage ?></h3>
                            <table class="table table-light rounded table-hover" id="tableRelatorio">
                                <thead class='thead bg-warning'>
                                    <?php foreach($tHead as $key => $value){ ?>
                                        <tr>
                                            <th> <?php echo $key ?> </th>
                                        </tr>
                                    <?php } ?>
                                    
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
                                <button class="btn-lg btn-primary pl-3 pr-3 p-2 mb-2">Acessar Relatório</button>
                                <?php echo $btn_box; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>