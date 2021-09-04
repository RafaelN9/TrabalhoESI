<?php

use PharIo\Manifest\Email;

include_once('View/header.php');

if($_REQUEST['formulario'] == NULL){header("Location: http://localhost/trabalhoESI/public/index.php");}

$form = $_REQUEST["formulario"];
$questoes = $form->getQuestoes();
$alunoForm = $_REQUEST["aluno_form"];
$tipoUsuario = $_SESSION['tipo_usuario'];



function setModalToUserType($tipoUsuario){
    $queryNota = "SELECT * FROM Nota WHERE Codigo <> 4";
    $resultNota = runSQL($queryNota);
    $optionNota = '';
    while ($rowNota = mysqli_fetch_assoc($resultNota)) {
        $optionNota .= "<option value='$rowNota[Codigo]'>$rowNota[Nome]</option>";
    }
    if($tipoUsuario == "professor"){
        $codigo_form = $_GET['revisao_relatorio'];
        return "<div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
                <div class='modal-header justify-content-center'>
                    <h4>Avaliação do Relatorio do Aluno</h4>
                </div>
                <div class='modal-body container-fluid'>
                    <form id='avaliacaoprof' method='POST' action='index.php' class='container-fluid'>
                        <input type='text' style='display:none' value='$codigo_form' name='codigo_form'/>
                        <textarea id='parecer' name='parecer' rows='10' class='rounded border form-control textarea-dont-resize mt-2' placeholder='Parecer'></textarea>
                       <select class='form-control mt-2' name='nota' id='nota'>
                          $optionNota
                        </select>
                    </form>
                </div>
                <div class='modal-footer justify-content-between'>
                    <button type='button' class='btn-lg btn-secondary pl-4 pr-4' data-dismiss='modal'>Fechar</button>
                    <input type='submit' name='avaliacaoProfessor' form='avaliacaoprof' value='Confirmar' class='btn-lg btn-primary float-right pl-4 pr-4'/>
                </div>
            </div>
        </div>";
    }
    else if($tipoUsuario == 'ccp'){
        $query = "SELECT avaliacaoprof.Parecer, nota.Nome as nota FROM avaliacaoprof, nota WHERE avaliacaoprof.Cod_Nota = nota.Codigo AND avaliacaoprof.Cod_Form = $_SESSION[cod_form] LIMIT 1";
        echo $query;
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result)){
            $nota = $row['nota'];
            $parecer = $row['Parecer'];
        }
        $codigo_form = $_GET['revisao_relatorio'];
        $cpf_ccp = $_SESSION['cpf'];
        return "<div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
                <div class='modal-header justify-content-center'>
                    <h4>Avaliação do Relatorio do Aluno</h4>
                </div>
                <div class='modal-body container-fluid text-center'>
                    <h4 class='align-self-center'>Avaliação do Professor</h4>
                    <div class='container-fluid border-bottom pb-2'>
                        <textarea id='parecerProf' name='parecerProf' rows='10' class='rounded border form-control textarea-dont-resize mt-2' placeholder='Parecer Professor' disabled>$parecer</textarea>
                        <input type='text' class='form-control mt-2' value='$nota' name='avaliacaoProf' id='avaliacaoProf' placeholder='Avaliação' disabled/>
                    </div>
                    <form id='avaliacaoCCP' method='POST' action='index.php' class='container-fluid'>
                        <input type='text' style='display:none' value='$codigo_form' name='codigo_form'/>
                        <input type='text' style='display:none' value='$cpf_ccp' name='cpf_ccp'/>
                        <textarea id='parecer' name='parecer' rows='10' class='rounded border form-control textarea-dont-resize mt-2' placeholder='Parecer'></textarea>
                        <select class='form-control mt-2' name='nota' >
                          $optionNota
                        </select>
                    </form>
                </div>
                <div class='modal-footer justify-content-between'>
                    <button type='button' class='btn-lg btn-secondary pl-4 pr-4' data-dismiss='modal'>Fechar</button>
                    <input type='submit' name='avaliacaoCCP' form='avaliacaoCCP' value='Confirmar' class='btn-lg btn-primary float-right pl-4 pr-4'/>
                </div>
            </div>
        </div>";
    }
    
}

?>

<div class="container-fluid" style="min-height: 100%;">
    <div class="container bg-principal p-5 overflow-auto text-light w-75" style="height: 100%;">
        
        <h2 class="text-center">Relatorio Semestral de <b><?php echo $alunoForm->getNome()?></b></h2>
        <div class='container-fluid'>
            <h4>Endereço de e-mail</h4>
            <p class='text-break'><?php echo $alunoForm->getEmail() ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Nome do Aluno</h4>
            <p class='text-break'><?php echo $alunoForm->getNome() ?></p>
        </div>
                
        <div class='container-fluid'>
            <h4>Nome do Orientador</h4>
            <p class='text-break'><?php echo $form->getProfessorResp()?></p>
        </div>
                
        <div class='container-fluid'>
            <h4>Numero USP</h4>
            <p class='text-break'><?php echo $alunoForm->getNumero_USP() ?></p>
        </div>
                
        <div class='container-fluid'>
            <h4>Link para o curriculum Lattes</h4>
            <p class='text-break'><?php echo $alunoForm->getLink_Curriculo() ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Data da última atualização do lattes</h4>
            <p class='text-break'><?php echo $form->getDataEnvio() ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Qual foi o resultado da avaliação do seu último relatório?</h4>
            <p class='text-break'><?php echo $questoes[2] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Qual é o seu curso?</h4>
            <p class='text-break'><?php echo $questoes[1] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em qual semestre está?</h4>
            <p class='text-break'><?php echo $questoes[3] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas obrigatórias você já obteve aprovação?</h4>
            <p class='text-break'><?php echo $questoes[4] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas optativas você já obteve aprovação?</h4>
            <p class='text-break'><?php echo $questoes[5] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Todos os conceitos em disciplinas cursadas no último semestre já foram
            divulgados? Caso não, espere até 2 dias antes da data máxima definida
            no site do PPgSI para enviar o seu relatório.</h4>
            <p class='text-break'><?php echo $questoes[6] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas você foi reprovado desde o início do
            mestrado/doutorado?</h4>
            <p class='text-break'><?php echo $questoes[7] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas você foi reprovado no último semestre cursado?</h4>
            <p class='text-break'><?php echo $questoes[8] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você já foi aprovado no exame de proficiência em idiomas?</h4>
            <p class='text-break'><?php echo $questoes[9] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você já realizou o exame de qualificação?</h4>
            <p class='text-break'><?php echo $questoes[10] ?></p>
        </div>

        <div class='container-fluid'>
            <h4>Se não qualificou, quanto tempo falta para o limite máximo de
            qualificação?</h4>
            <p class='text-break'><?php echo $questoes[11] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Se você já fez sua qualificação e foi aprovado, quanto tempo falta para o
            limite máximo do depósito da sua dissertação/tese?</h4>
            <p class='text-break'><?php echo $questoes[12] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Quantos artigos referentes a sua pesquisa de mestrado/doutorado você
            teve aceitos ou publicados?</h4>
            <p class='text-break'><?php echo $questoes[13] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Quantos artigos você submeteu e ainda estão aguardando resposta?</h4>
            <p class='text-break'><?php echo $questoes[14] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você possui artigo em preparação para submissão? Qual o estágio dele?</h4>
            <p class='text-break'><?php echo $questoes[15] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Qual o estágio atual de sua pesquisa? Apresente toda e qualquer
            atividade que já tenha sido realizada no contexto de seu projeto de
            pesquisa (mesmo que ainda incompleta). Faça uma descrição detalhada.</h4>
            <p class='text-break'><?php echo $questoes[16] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você participou de algum congressos no país? Se sim, indicar local, se
            houve apresentação de trabalho e se o congresso é ou não internacional.</h4>
            <p class='text-break'><?php echo $questoes[17] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você participou de algum congresso no exterior? Se sim, indicar local e se
            houve apresentação de trabalho.</h4>
            <p class='text-break'><?php echo $questoes[18] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você realizou algum estágio de pesquisa ou visita de pesquisa no exterior
            (incluindo sanduíche)? Se sim, indique o nome da universidade e o
            período.</h4>
            <p class='text-break'><?php echo $questoes[19] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você tem algo a mais a declarar para a CCP - PPgSI?</h4>
            <p class='text-break'><?php echo $questoes[20] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Comentários finais do ORIENTANDO sobre seu desempenho no último
            semestre, considerando o relatório reapresentado:</h4>
            <p class='text-break'><?php echo $questoes[21] ?></p>
        </div>

        <?php
            if($_SESSION['from'] == 'pendente')
                echo '<button class="btn-lg btn-primary float-right pl-4 pr-4" data-toggle="modal" data-target="#modalAvaliacao">Avaliar</button>';
        ?>

    </div>
</div>

<div id="modalAvaliacao" class="modal fade" role="dialog">
    <?php echo setModalToUserType($tipoUsuario);?>
    
</div>

<?php include_once('View/footer.php'); ?>