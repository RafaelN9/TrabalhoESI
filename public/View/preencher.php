<?php
$_SESSION['from'] = 'preencher';
include_once('header.php');

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
                    <form class="w-100 needs-validation" method="POST" action="../index.php">
                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="email">1. Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mb-4 p-4 " name="email" value="Email@gmail.com" readonly required>
                        </div>
                            <h6 class="bg-info p-3 rounded-top text-center">Dados gerais</h6>
                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
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

                        <h6 class="bg-info p-3 rounded-top text-center">Este relatório é referente a que semestre do seu curso? (último semestre
                            concluído):</h6>

                        <label for="semestreMestrado">9. <span class="text-danger">*</span></label>
                        <div class="mb-4" name="semestre" id="semestreMestrado">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_1" value="1" required>
                                <label class="form-check-label" for="q9_1">
                                    1° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_2" value="2" required>
                                <label class="form-check-label" for="q9_2">
                                    2° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_3" value="3" required>
                                <label class="form-check-label" for="q9_3">
                                    3° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_4" value="4" required>
                                <label class="form-check-label" for="q9_4">
                                    4° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q9" id="q9_5" value="5" required>
                                <label class="form-check-label" for="q9_5">
                                    5° semestre do curso
                                </label>
                            </div>
                        </div>

                        <h6 class="bg-info p-3 rounded-top text-center">Este relatório é referente a que semestre do seu curso? (último semestre
                            concluído):</h6>

                        <label for="semestreDoutorado">10. <span class="text-danger">*</span></label>
                        <div class="mb-4" name="semestre" id="semestreDoutorado">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_1" value="1" required>
                                <label class="form-check-label" for="q10_1">
                                    1° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_2" value="2" required>
                                <label class="form-check-label" for="q10_2">
                                    2° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_3" value="3" required>
                                <label class="form-check-label" for="q10_3">
                                    3° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_4" value="4" required>
                                <label class="form-check-label" for="q10_4">
                                    4° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_5" value="5" required>
                                <label class="form-check-label" for="q10_5">
                                    5° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_6" value="6" required>
                                <label class="form-check-label" for="q10_6">
                                    6° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_7" value="7" required>
                                <label class="form-check-label" for="q10_7">
                                    7° semestre do curso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q10" id="q10_8" value="8" required>
                                <label class="form-check-label" for="q10_8">
                                    8° semestre do curso
                                </label>
                            </div>
                        </div>

                        <h6 class="bg-info p-3 rounded-top text-center">Atividades didáticas</h6>

                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="q11">11. Em quantas disciplinas obrigatórias você já obteve aprovação? <span class="text-danger">*</span></label>
                            <input type="number" class="form-control mb-4 p-4 " name="q11" required>

                            <label for="q11">12. Em quantas disciplinas optativas você já obteve aprovação? <span class="text-danger">*</span></label>
                            <input type="number" class="form-control mb-4 p-4 " name="q11" required>
                        </div>

                        <label>13. Todos os conceitos em disciplinas cursadas no último semestre já foram
                            divulgados? Caso não, espere até 2 dias antes da data máxima definida no site
                            do PPgSI para enviar o seu relatório.</label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" id="q13_1" value="sim">
                                <label class="form-check-label" for="q13_1">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" id="q13_2" value="nao">
                                <label class="form-check-label" for="q13_2">
                                    Não
                                </label>
                            </div>
                        </div>

                        <label>14. Em quantas disciplinas você foi reprovado desde o início do
                            mestrado/doutorado? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q14" id="q14_1" value="0" required>
                                <label class="form-check-label" for="q14_1">
                                    0
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q14" id="q14_2" value="1" required>
                                <label class="form-check-label" for="q14_2">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q14" id="q14_3" value="2" required>
                                <label class="form-check-label" for="q14_3">
                                    2
                                </label>
                            </div>
                        </div>

                        <label>15. Em quantas disciplinas você foi reprovado no último semestre cursado? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" id="q15_1" value="0" required>
                                <label class="form-check-label" for="q15_1">
                                    0
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" id="q15_2" value="1" required>
                                <label class="form-check-label" for="q15_2">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" id="q15_3" value="2" required>
                                <label class="form-check-label" for="q15_3">
                                    2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" id="q15_4" value="terminado" required>
                                <label class="form-check-label" for="q15_4">
                                    Já terminei as disciplinas
                                </label>
                            </div>
                        </div>

                        <label>16. Você já foi aprovado no exame de proficiência em idiomas? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" id="q16_1" value="sim" required>
                                <label class="form-check-label" for="q16_1">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" id="q16_2" value="nao" required>
                                <label class="form-check-label" for="q16_2">
                                    Não
                                </label>
                            </div>
                        </div>

                        <label>17. Você já foi aprovado no exame de proficiência em idiomas? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" id="q17_1" value="aprovado" required>
                                <label class="form-check-label" for="q17_1">
                                    Sim. Fui aprovado.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" id="q17_2" value="reprovado" required>
                                <label class="form-check-label" for="q17_2">
                                    Sim. Fui reporvado.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" id="q17_3" value="nao" required>
                                <label class="form-check-label" for="q17_3">
                                    Não.
                                </label>
                            </div>
                        </div>

                        <label>18. Se não qualificou, quanto tempo falta para o limite máximo de qualificação?</label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q18" id="q18_1" value="Menos de 3 meses" >
                                <label class="form-check-label" for="q18_1">
                                    Menos de 3 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q18" id="q18_2" value="Entre 3 e 6 meses" >
                                <label class="form-check-label" for="q18_2">
                                    Entre 3 e 6 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q18" id="q18_3" value="Mais de 6 meses" >
                                <label class="form-check-label" for="q18_3">
                                    Mais de 6 meses
                                </label>
                            </div>
                        </div>

                        <label>19. Se você já fez sua qualificação e foi aprovado, quanto tempo falta para o limite
                            máximo do depósito da sua dissertação/tese?</label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_1" value="Menos de 3 meses" >
                                <label class="form-check-label" for="q19_1">
                                    Menos de 3 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_2" value="Entre 3 e 6 meses" >
                                <label class="form-check-label" for="q19_2">
                                    Entre 3 e 6 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_3" value="Mais de 6 meses" >
                                <label class="form-check-label" for="q19_3">
                                    Mais de 6 meses
                                </label>
                            </div>
                        </div>

                        <label>20. Quantos artigos referentes a sua pesquisa de mestrado/doutorado você teve
                            aceitos ou publicados? (Obs: Você deve inserir os artigos publicados no seu
                            currículo Lattes) <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q20" id="q20_1" value="0" required>
                                <label class="form-check-label" for="q20_1">
                                    0
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q20" id="q20_2" value="1" required>
                                <label class="form-check-label" for="q20_2">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q20" id="q20_3" value="2" required>
                                <label class="form-check-label" for="q20_3">
                                    2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q20" id="q20_4" value="Mais de 2" required>
                                <label class="form-check-label" for="q20_4">
                                    Mais de 2
                                </label>
                            </div>
                        </div>

                        <label>21. Quantos artigos você submeteu e ainda estão aguardando resposta? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_1" value="0" required>
                                <label class="form-check-label" for="q21_1">
                                    0
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_2" value="1" required>
                                <label class="form-check-label" for="q21_2">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_3" value="2" required>
                                <label class="form-check-label" for="q21_3">
                                    2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_4" value="Mais de 2" required>
                                <label class="form-check-label" for="q21_4">
                                    Mais de 2
                                </label>
                            </div>
                        </div>

                        <label>22. Você possui artigo em preparação para submissão? Qual o estágio dele? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" id="q22_1" value="Não possuo" required>
                                <label class="form-check-label" for="q22_1">
                                    Não possuo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" id="q22_2" value="Experimentos em elaboração" required>
                                <label class="form-check-label" for="q22_2">
                                    Experimentos em elaboração
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" id="q22_3" value="Aguardando coleta de dados" required>
                                <label class="form-check-label" for="q22_3">
                                    Aguardando coleta de dados
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" id="q22_4" value="Em fase de escrita" required>
                                <label class="form-check-label" for="q22_4">
                                    Em fase de escrita
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" id="q22_5" value="Em fase de tradução" required>
                                <label class="form-check-label" for="q22_5">
                                    Em fase de tradução
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q22" id="q22_6" value="Preparando resposta para os revisores" required>
                                <label class="form-check-label" for="q22_6">
                                    Preparando resposta para os revisores
                                </label>
                            </div>
                        </div>

                        <label for="q23">23. Qual o estágio atual de sua pesquisa? Apresente toda e qualquer atividade que
                            já tenha sido realizada no contexto de seu projeto de pesquisa (mesmo que
                            ainda incompleta). Faça uma descrição detalhada. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q23" id="q23" required></textarea>

                        <label for="q24">24. Você participou de algum congressos no país? Se sim, indicar local, se houve
                            apresentação de trabalho e se o congresso é ou não internacional. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q24" id="q24" required></textarea>

                        <label for="q25">25. Você participou de algum congresso no exterior? Se sim, indicar local e se
                            houve apresentação de trabalho. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q25" id="q25" required></textarea>

                        <label for="q26">26. Você realizou algum estágio de pesquisa ou visita de pesquisa no exterior
                            (incluindo sanduíche)? Se sim, indique o nome da universidade e o período. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q26" id="q26" required></textarea>

                        <label for="q27">27. Você tem algo a mais a declarar para a CCP - PPgSI?</label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q27" id="q27"></textarea>

                        <div class="d-flex border rounded mb-4">
                            <h6 class="bg-info p-3 rounded-top text-center m-0">Reavaliação do desempenho do orientando:</h6>
                            <p class="p-1 m-0">Apenas para reapresentação de relatórios que receberam parecer “insatisfatório”
                                pela CCP-PPgSI a fim de obter uma reavaliação.
                                A prerrogativa de entregar uma nova versão do relatório é oferecida ao
                                orientando assumindo situações em que, por exemplo, ele precise ou queira
                                esclarecer ou incluir informações que sejam relativas exclusivamente ao período
                                avaliado neste relatório (ou seja, apenas o semestre anterior já encerrado), tais
                                como:
                                -Explicar melhor alguma atividade realizada no período em questão que não foi
                                bem explicada na primeira versão do relatório e, portanto, não avaliada
                                apropriadamente de acordo com a visão do orientando e do orientador.
                                - Incluir alguma atividade realizada no período em questão, mas que o orientando
                                havia esquecido de incluir e que pode ter possivelmente prejudicado a avaliação
                                de seu desempenho.
                                - Argumentar os motivos pelos quais ele considera que apesar de suas atividades
                                no período em questão terem sido exatamente aquelas (de forma que nada novo
                                precisa ser adicionado), ainda assim orientando e orientador consideram que o
                                desempenho não deveria ter sido considerado “insatisfatório”.</p>
                        </div>

                        <label for="q28">28. Comentários finais do ORIENTANDO sobre seu desempenho no último
                            semestre, considerando o relatório reapresentado:</label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q28" id="q28"></textarea>

                        <input type="submit" class="btn btn-primary p-3 float-right" name="formulario" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="scripts/scriptPreencher.js" type="text/javascript"></script>

<?php include_once('../view/footer.php'); ?>