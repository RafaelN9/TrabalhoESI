<?php include_once('../view/simple_header.php');

$queryCurso = "SELECT * FROM Cursos";
$resultCurso = runSQL($queryCurso);
$optionCurso = '';
while ($rowCurso = mysqli_fetch_assoc($resultCurso)) {
    $optionCurso .= '<option value=' . $rowCurso['Codigo'] . '>' . $rowCurso['Nome'] . '</option>';
}
?>
<div class="container-fluid h-100 d-flex align-items-center">
    <div class="container-fluid ">
        <div class="row h-100 w-100 justify-content-center mt-5 mb-2">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8 bg-white h-100 rounded">
                <div id="formulario" class="d-flex justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                    <form class="w-100" method="POST" action="../data_base/functions.php">
                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="email">1. Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mb-4 p-4 " name="email" value="Email@gmail.com" readonly>

                            <label for="nome">2. nome do aluno<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="nome" id="nome" value="Nome" readonly>

                            <label for="orientador">3. Nome do orientador<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="orientador" id="orientador" value="orientador" readonly>

                            <label for="NumUsp">4. Número USP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="NumUsp" id="NumUsp" value="N° USP" readonly>

                            <label for="linkCurriculo">5. Link para o curriculum lattes<span class="text-danger">*</span></label>
                            <input type="linkCurriculo" class="form-control mb-4 p-4" name="linkCurriculo" value="link.com" readonly>

                            <label for="dataCurriculo">6. Data da última atualização do lattes<span class="text-danger">*</span></label>
                            <input type="date" class="form-control mb-4 p-4" name="dataCurriculo">
                        </div>

                        <div class="mb-4">
                            <label for="Email">7. Qual foi o resultado da avaliação do seu último relatório?<span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_1" value="Aprovado">
                                <label class="form-check-label" for="q7_1">
                                    Aprovado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_2" value="Aprovado com ressalvas">
                                <label class="form-check-label" for="q7_2">
                                    Aprovado com ressalvas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_3" value="Insatisfatório">
                                <label class="form-check-label" for="q7_3">
                                    Insatisfatório
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="Email">8. Qual é o seu curso?<span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_1" value="Mestrado">
                                <label class="form-check-label" for="q8_1">
                                    Mestrado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_2" value="Doutorado">
                                <label class="form-check-label" for="q8_2">
                                    Doutorado
                                </label>
                            </div>
                        </div>



                        <input type="submit" class="btn btn-primary p-3 float-right" name="formluario" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../view/footer.php'); ?>