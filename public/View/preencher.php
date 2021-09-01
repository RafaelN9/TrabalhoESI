<?php

$queryCurso = "SELECT * FROM Cursos";
$resultCurso = runSQL($queryCurso);
$optionCurso = '';
while ($rowCurso = mysqli_fetch_assoc($resultCurso)) {
    $optionCurso .= '<div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8_'.$rowCurso['Codigo'].'" value="'.$rowCurso['Codigo'].'" required>
                        <label class="form-check-label" for="q8_'.$rowCurso['Codigo'].'">
                        '.$rowCurso['Nome'].'
                        </label>
                     </div>';
}

$queryNota = "SELECT * FROM Nota";
$resultNota = runSQL($queryNota);
$optionNota = '';
while ($rowNota = mysqli_fetch_assoc($resultNota)) {
    $optionNota .= '<div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7_'.$rowNota['Codigo'].'" value="'.$rowNota['Codigo'].'" required>
                        <label class="form-check-label" for="q7_'.$rowNota['Codigo'].'">
                        '.$rowNota['Nome'].'
                        </label>
                     </div>';
}

?>
<title>Formulário</title>
<style>
    body{
        overflow-y: scroll;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    ::-webkit-scrollbar{
        width: auto;
    }
</style>
<div class="container-fluid h-100 d-flex">
    <div class="container-fluid ">
        <div class="row h-100 w-100 mx-auto justify-content-center mt-2 mb-2">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8 bg-white h-100 rounded">
                <div id="formulario" class="d-flex justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                    <form class="w-100 needs-validation" id="formularioRel" method="POST" action="index.php">
                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="email">1. Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mb-4 p-4 " name="email" value="Email@gmail.com" required>
                        </div>
                            <h6 class="bg-info p-3 rounded-top text-center">Dados gerais</h6>
                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="nome">2. Nome do aluno<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="nome" id="nome" value="Nome" required>

                            <label for="orientador">3. Nome do orientador<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="orientador" id="orientador" value="orientador" required>

                            <label for="NumUsp">4. Número USP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-4 p-4" name="NumUsp" id="NumUsp" value="N° USP" required>

                            <label for="linkCurriculo">5. Link para o curriculum lattes<span class="text-danger">*</span></label>
                            <input type="linkCurriculo" class="form-control mb-4 p-4" name="linkCurriculo" value="link.com" required>

                            <label for="dataCurriculo">6. Data da última atualização do lattes<span class="text-danger">*</span></label>
                            <input type="date" class="form-control mb-4 p-4" name="q6" required>
                        </div>

                        <label for="resultadoUltimaAvalicao">7. Qual foi o resultado da avaliação do seu último relatório?<span class="text-danger">*</span></label>
                        <div class="mb-4" name="resultadoUltimaAvalicao">
                            <?php
                                echo $optionNota;
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q7" id="q7_4" value="Não se aplica" required>
                                <label class="form-check-label" for="q7_4">
                                    Não se aplica
                                </label>
                            </div>
                        </div>

                        <label for="curso">8. Qual é o seu curso?<span class="text-danger">*</span></label>
                        <div class="mb-4" name="curso">
                            <?php
                            echo $optionCurso;
                            ?>
                        </div>

                        <div id="q9">
                            <h6 class="bg-info p-3 rounded-top text-center">Selecione uma opção na questão 8<br>Este relatório é referente a que semestre do seu curso? (último semestre
                                concluído):</h6>

                            <label for="semestre">9. <span class="text-danger">*</span></label>
                            <div class="mb-4" name="semestre" id="semestre">
                            </div>
                        </div>

                        <h6 class="bg-info p-3 rounded-top text-center">Atividades didáticas</h6>

                        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-8 m-0 p-0">
                            <label for="q10">10. Em quantas disciplinas obrigatórias você já obteve aprovação? <span class="text-danger">*</span></label>
                            <input type="number" class="form-control mb-4 p-4 " name="q10" required>

                            <label for="q11">11. Em quantas disciplinas optativas você já obteve aprovação? <span class="text-danger">*</span></label>
                            <input type="number" class="form-control mb-4 p-4 " name="q11" required>
                        </div>

                        <label>12. Todos os conceitos em disciplinas cursadas no último semestre já foram
                            divulgados? Caso não, espere até 2 dias antes da data máxima definida no site
                            do PPgSI para enviar o seu relatório.</label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q12" id="q12_1" value="Sim">
                                <label class="form-check-label" for="q12_1">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q12" id="q12_2" value="Não">
                                <label class="form-check-label" for="q12_2">
                                    Não
                                </label>
                            </div>
                        </div>

                        <label>13. Em quantas disciplinas você foi reprovado desde o início do
                            mestrado/doutorado? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" id="q13_1" value="0" required>
                                <label class="form-check-label" for="q13_1">
                                    0
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" id="q13_2" value="1" required>
                                <label class="form-check-label" for="q13_2">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q13" id="q13_3" value="2" required>
                                <label class="form-check-label" for="q13_3">
                                    2
                                </label>
                            </div>
                        </div>

                        <label>14. Em quantas disciplinas você foi reprovado no último semestre cursado? <span class="text-danger">*</span></label>
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q14" id="q14_4" value="Já terminei as disciplina" required>
                                <label class="form-check-label" for="q14_4">
                                    Já terminei as disciplinas
                                </label>
                            </div>
                        </div>

                        <label>15. Você já foi aprovado no exame de proficiência em idiomas? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" id="q15_1" value="Sim" required>
                                <label class="form-check-label" for="q15_1">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q15" id="q15_2" value="Não" required>
                                <label class="form-check-label" for="q15_2">
                                    Não
                                </label>
                            </div>
                        </div>

                        <label>16. Você já realizou o exame de qualificação? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" id="q16_1" value="Sim. Fui aprovado." required>
                                <label class="form-check-label" for="q16_1">
                                    Sim. Fui aprovado.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" id="q16_2" value="Sim. Fui reporvado." required>
                                <label class="form-check-label" for="q16_2">
                                    Sim. Fui reporvado.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q16" id="q16_3" value="Não." required>
                                <label class="form-check-label" for="q16_3">
                                    Não.
                                </label>
                            </div>
                        </div>

                        <label>17. Se não qualificou, quanto tempo falta para o limite máximo de qualificação?</label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" id="q17_1" value="Menos de 3 meses" >
                                <label class="form-check-label" for="q17_1">
                                    Menos de 3 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" id="q17_2" value="Entre 3 e 6 meses" >
                                <label class="form-check-label" for="q17_2">
                                    Entre 3 e 6 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q17" id="q17_3" value="Mais de 6 meses" >
                                <label class="form-check-label" for="q17_3">
                                    Mais de 6 meses
                                </label>
                            </div>
                        </div>

                        <label>18. Se você já fez sua qualificação e foi aprovado, quanto tempo falta para o limite
                            máximo do depósito da sua dissertação/tese?</label>
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

                        <label>19. Quantos artigos referentes a sua pesquisa de mestrado/doutorado você teve
                            aceitos ou publicados? (Obs: Você deve inserir os artigos publicados no seu
                            currículo Lattes) <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_1" value="0" required>
                                <label class="form-check-label" for="q19_1">
                                    0
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_2" value="1" required>
                                <label class="form-check-label" for="q19_2">
                                    1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_3" value="2" required>
                                <label class="form-check-label" for="q19_3">
                                    2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q19" id="q19_4" value="Mais de 2" required>
                                <label class="form-check-label" for="q19_4">
                                    Mais de 2
                                </label>
                            </div>
                        </div>

                        <label>20. Quantos artigos você submeteu e ainda estão aguardando resposta? <span class="text-danger">*</span></label>
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

                        <label>21. Você possui artigo em preparação para submissão? Qual o estágio dele? <span class="text-danger">*</span></label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_1" value="Não possuo" required>
                                <label class="form-check-label" for="q21_1">
                                    Não possuo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_2" value="Experimentos em elaboração" required>
                                <label class="form-check-label" for="q21_2">
                                    Experimentos em elaboração
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_3" value="Aguardando coleta de dados" required>
                                <label class="form-check-label" for="q21_3">
                                    Aguardando coleta de dados
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_4" value="Em fase de escrita" required>
                                <label class="form-check-label" for="q21_4">
                                    Em fase de escrita
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_5" value="Em fase de tradução" required>
                                <label class="form-check-label" for="q21_5">
                                    Em fase de tradução
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q21" id="q21_6" value="Preparando resposta para os revisores" required>
                                <label class="form-check-label" for="q21_6">
                                    Preparando resposta para os revisores
                                </label>
                            </div>
                        </div>

                        <label for="q22">22. Qual o estágio atual de sua pesquisa? Apresente toda e qualquer atividade que
                            já tenha sido realizada no contexto de seu projeto de pesquisa (mesmo que
                            ainda incompleta). Faça uma descrição detalhada. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q22" id="q22" required></textarea>

                        <label for="q23">23. Você participou de algum congressos no país? Se sim, indicar local, se houve
                            apresentação de trabalho e se o congresso é ou não internacional. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q23" id="q23" required></textarea>

                        <label for="q24">24. Você participou de algum congresso no exterior? Se sim, indicar local e se
                            houve apresentação de trabalho. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q24" id="q24" required></textarea>

                        <label for="q25">25. Você realizou algum estágio de pesquisa ou visita de pesquisa no exterior
                            (incluindo sanduíche)? Se sim, indique o nome da universidade e o período. <span class="text-danger">*</span></label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q25" id="q25" required></textarea>

                        <label for="q26">26. Você tem algo a mais a declarar para a CCP - PPgSI?</label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q26" id="q26"></textarea>

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

                        <label for="q27">27. Comentários finais do ORIENTANDO sobre seu desempenho no último
                            semestre, considerando o relatório reapresentado:</label>
                        <textarea class="form-control mb-4 p-1" rows="5" name="q27" id="q27"></textarea>
                        <button type="button" class="btn btn-primary p-3 float-right" id="confirmar">
                            Enviar
                        </button>

                        <div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Título do modal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja confirmar o envio de email?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="formulario" id="envia" value="Confirmar">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="View/scripts/scriptPreencher.js?v=<?php echo time(); ?>" type="text/javascript"></script>
