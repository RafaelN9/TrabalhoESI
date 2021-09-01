<?php

use PharIo\Manifest\Email;

include_once('View/header.php');
    $form = $_REQUEST["formulario"];
    $alunoForm = $_REQUEST["aluno_form"];
    $sectionTitle = '#SectionTitle';
    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris in diam faucibus dapibus. Sed quis pulvinar nulla. Fusce nec fermentum justo. Etiam ut libero lacinia, elementum augue at, vestibulum quam. Maecenas posuere eleifend pharetra. Donec eleifend lobortis volutpat.';

?>

<div class="container-fluid" style="min-height: 100%;">
    <div class="container bg-principal p-5 overflow-auto text-light w-75" style="height: 100%;">
        
        <h2 class="text-center">Relatorio Semestral de <b><?php echo $alunoForm['Nome']?></b></h2>

        <div class='container-fluid'>
            <h4>Endereço de e-mail</h4>
            <p class='text-break'><?php echo $alunoForm['Email'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Nome do Aluno</h4>
            <p class='text-break'><?php echo $alunoForm['Nome'] ?></p>
        </div>
                
        <div class='container-fluid'>
            <h4>Nome do Orientador</h4>
            <p class='text-break'>#TO-DO</p>
        </div>
                
        <div class='container-fluid'>
            <h4>Numero USP</h4>
            <p class='text-break'><?php echo $alunoForm['Numero_USP'] ?></p>
        </div>
                
        <div class='container-fluid'>
            <h4>Link para o curriculum Lattes</h4>
            <p class='text-break'><?php echo $alunoForm['Link_Curriculo'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Data da última atualização do lattes</h4>
            <p class='text-break'><?php echo $form['Questao_6'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Qual foi o resultado da avaliação do seu último relatório?</h4>
            <p class='text-break'><?php echo $form['Questao_7'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Qual é o seu curso?</h4>
            <p class='text-break'><?php echo $form['Questao_8'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em qual semestre está?</h4>
            <p class='text-break'><?php echo $form['Questao_9'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas obrigatórias você já obteve aprovação?</h4>
            <p class='text-break'><?php echo $form['Questao_10'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas optativas você já obteve aprovação?</h4>
            <p class='text-break'><?php echo $form['Questao_11'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Todos os conceitos em disciplinas cursadas no último semestre já foram
            divulgados? Caso não, espere até 2 dias antes da data máxima definida
            no site do PPgSI para enviar o seu relatório.</h4>
            <p class='text-break'><?php echo $form['Questao_12'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas você foi reprovado desde o início do
            mestrado/doutorado?</h4>
            <p class='text-break'><?php echo $form['Questao_13'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Em quantas disciplinas você foi reprovado no último semestre cursado?</h4>
            <p class='text-break'><?php echo $form['Questao_14'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você já foi aprovado no exame de proficiência em idiomas?</h4>
            <p class='text-break'><?php echo $form['Questao_15'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você já realizou o exame de qualificação?</h4>
            <p class='text-break'><?php echo $form['Questao_16'] ?></p>
        </div>

        <div class='container-fluid'>
            <h4>Se não qualificou, quanto tempo falta para o limite máximo de
            qualificação?</h4>
            <p class='text-break'><?php echo $form['Questao_17'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Se você já fez sua qualificação e foi aprovado, quanto tempo falta para o
            limite máximo do depósito da sua dissertação/tese?</h4>
            <p class='text-break'><?php echo $form['Questao_18'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Quantos artigos referentes a sua pesquisa de mestrado/doutorado você
            teve aceitos ou publicados?</h4>
            <p class='text-break'><?php echo $form['Questao_19'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Quantos artigos você submeteu e ainda estão aguardando resposta?</h4>
            <p class='text-break'><?php echo $form['Questao_20'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você possui artigo em preparação para submissão? Qual o estágio dele?</h4>
            <p class='text-break'><?php echo $form['Questao_21'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Qual o estágio atual de sua pesquisa? Apresente toda e qualquer
            atividade que já tenha sido realizada no contexto de seu projeto de
            pesquisa (mesmo que ainda incompleta). Faça uma descrição detalhada.</h4>
            <p class='text-break'><?php echo $form['Questao_22'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você participou de algum congressos no país? Se sim, indicar local, se
            houve apresentação de trabalho e se o congresso é ou não internacional.</h4>
            <p class='text-break'><?php echo $form['Questao_23'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você participou de algum congresso no exterior? Se sim, indicar local e se
            houve apresentação de trabalho.</h4>
            <p class='text-break'><?php echo $form['Questao_24'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você realizou algum estágio de pesquisa ou visita de pesquisa no exterior
            (incluindo sanduíche)? Se sim, indique o nome da universidade e o
            período.</h4>
            <p class='text-break'><?php echo $form['Questao_25'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Você tem algo a mais a declarar para a CCP - PPgSI?</h4>
            <p class='text-break'><?php echo $form['Questao_26'] ?></p>
        </div>
        
        <div class='container-fluid'>
            <h4>Comentários finais do ORIENTANDO sobre seu desempenho no último
            semestre, considerando o relatório reapresentado:</h4>
            <p class='text-break'><?php echo $form['Questao_27'] ?></p>
        </div>
    
        <a class="btn-lg btn-primary float-right pl-4 pr-4">Avaliar</a>
    </div>
</div>

<?php include_once('View/footer.php'); ?>