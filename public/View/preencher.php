<?php include_once('../view/header.php');

$queryCurso = "SELECT * FROM Cursos";
$resultCurso = runSQL($queryCurso);
$optionCurso = '';
while ($rowCurso = mysqli_fetch_assoc($resultCurso)) {
    $optionCurso .= '<option value=' . $rowCurso['Codigo'] . '>' . $rowCurso['Nome'] . '</option>';
}

?>
<div class="container-fluid h-100 d-flex">
    <div class="container-fluid ">
        <div class="row h-100 w-100 mx-auto justify-content-center mt-2 mb-2">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8 bg-white h-100 rounded">
                <div id="formulario" class="d-flex justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                    <form class="w-100 needs-validation" method="POST" action="../data_base/functions.php">
                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="email">1. Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mb-4 p-4 " name="email" value="Email@gmail.com" readonly required> 

                            <label for="nome">2. Nome do aluno<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="nome" id="nome" value="Nome" readonly required>

                            <label for="orientador">3. Nome do orientador<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="orientador" id="orientador" value="orientador" readonly required>

                            <label for="NumUsp">4. Número USP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="NumUsp" id="NumUsp" value="N° USP" readonly required>

                            <label for="linkCurriculo">5. Link para o curriculum lattes<span class="text-danger">*</span></label>
                            <input type="linkCurriculo" class="form-control mb-4 p-4" name="linkCurriculo" value="link.com" readonly required>

                            <label for="dataCurriculo">6. Data da última atualização do lattes<span class="text-danger">*</span></label>
                            <input type="date" class="form-control mb-4 p-4" name="dataCurriculo" required>
                        </div>

                        <label for="resultadoUltimaAvalicao">7. Qual foi o resultado da avaliação do seu último relatório?<span class="text-danger">*</span></label>
                        <div class="mb-4" name="resultadoUltimaAvalicao">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_1" value="Aprovado" required>
                                <label class="form-check-label" for="q7_1">
                                    Aprovado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_2" value="Aprovado com ressalvas" required>
                                <label class="form-check-label" for="q7_2">
                                    Aprovado com ressalvas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_3" value="Insatisfatório" required>
                                <label class="form-check-label" for="q7_3">
                                    Insatisfatório
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_4" value="Não se aplica" required>
                                <label class="form-check-label" for="q7_4">
                                    Não se aplica
                                </label>
                            </div>
                        </div>

                        <label for="curso">8. Qual é o seu curso?<span class="text-danger">*</span></label>
                        <div class="mb-4" name="curso">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_1" value="Mestrado" required>
                                <label class="form-check-label" for="q8_1">
                                    Mestrado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q8" id="q8_2" value="Doutorado" required>
                                <label class="form-check-label" for="q8_2">
                                    Doutorado
                                </label>
                            </div>
                        </div>

                        <label for="semestre">*É necessario escolher uma opção acima<br>9. Este relatório é referente a que semestre do seu curso?<span class="text-danger">*</span></label>
                        <div class="mb-4" name="semestre" id="semestre">

                        </div>




                        <input type="submit" class="btn btn-primary p-3 float-right" name="formulario" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js" type="text/javascript"></script>

<?php include_once('../view/footer.php'); ?>