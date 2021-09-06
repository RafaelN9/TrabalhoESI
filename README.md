<h1 align='center'> Sistema de Avaliação de Pos-Graduação</h1>

<p style='text-align: center;'>Este é um trabalho da disciplina de Engenharia de Software I do curso de Ciência da Computação da FCT - UNESP. <br>Este projeto consiste na execução de atividades de engenharia de software para o desenvolvimento do Sistema de avaliação de desempenho dos alunos do PPgSI (Programa de Pós-graduação em Sistemas de Informação) da EACH-USP.</p>

<h2 align='center'>💻</h2>

![Visualização do Desktop](https://i.imgur.com/xbJpggu.png)

<h2 align='center'>Descrição do Projeto</h2>

<p align='justify'>	Esse projeto tem como mote a facilitação do processo de avaliação dos relatórios dos alunos participantes do PPgSI, já que o método utilizado atualmente desprende muito tempo de orientadores, alunos e coordenadores do programa, visto que é necessário efetuar a gerencia, coordenação e comunicação entres os envolvidos de forma manual.<br> 	O projeto em si foi dividido em diversas etapas, visando seguir os conceitos de engenharia de software apresentados durante o curso. Portanto inicialmente fora feito um levantamento das necessidades a partir de uma entrevista com o 'cliente', com isso criou-se as historias de usuários e os casos de uso para orientação durante a fase de planejamento, ja na fase de planejamento foram definidos as tarefas a serem executadas durantes os dois ciclos previsto para o desenvolvimento da aplicação, seguindo os conceitos do método Scrum, e uso do sistema Kanban para organização dentro dos ciclos. </p>

<details>
    <summary>Historias de Usuario</summary>
	<ol>
        <li>Como aluno:
        	<ul>
                <li>quero preencher um formulário para fornecer as informações requeridas no sistema.</li>
                <li>quero receber uma notificação sobre o parecer da CCP para estar ciente do porquê da minha avaliação.</li>
                <li>quero receber uma notificação sobre a avaliação final da CCP para saber se necessito enviar outro relatório.</li>
                <li>que obtive INSATISFATÓRIO como avaliação, quero apresentar um novo relatório em um prazo de 30 dias para ser reavaliado.</li>
            </ul>
        </li>
        <li>Como orientador:
        	<ul>
                <li>quero analisar os relatórios para poder dar um parecer.</li>
                <li>quero analisar os relatórios para poder avaliá-lo. As avaliações podem ser ADEQUADO, ADEQUADO COM RESSALVAS ou INSATISFATÓRIO. </li>
            </ul>
        </li>
        <li>Como CCP:
        	<ul>
                <li>quero analisar o parecer dos orientadores para emitir o meu próprio parecer.</li>
                <li>quero analisar a avaliação dos orientadores para emitir a minha própria avaliação.</li>
                <li>quero manter o histórico de avaliação de meus alunos para que seja possível identificar alunos que recorrentemente recebem parecer insatisfatório.
				</li>
                <li>quero verificar se um aluno recebeu duas avaliações insatisfatórias seguidas para desligá-lo conforme determinado no regulamento do programa.</li>
                <li>Quero enviar a avaliação final do relatório.</li>
            </ul>
        </li>
   </ol>
</details>
<details>
    <summary>Diagrama de casos de uso</summary>
    <img src='https://lh4.googleusercontent.com/whj4I_d7JH-qyslntRF0WloDAxMybLnRQvaF1ncCUTGs688JLZRRI_lmJKuDWoKWKSPK1HDPa1dMcQh5cGw9llyyTqR1C4ootjqofLkX-kBb9WokrSvhp5TTaGCQXnfZGq4DaBtT=s0' alt='Diagrama de caso de uso'/>
</details>

<details>
    <summary>Descrição dos casos de uso</summary>
    <br>
    Caso de uso: Preencher formulário<br>
    Formato: Resumido<br>
    Ator principal: Aluno<br>
    Visão Geral: O aluno preenche um formulário com as informações do andamento do projeto.<br>
<br>
Caso de uso: Enviar formulário<br>
Formato: Abstrato Completo<br>
Ator principal: Aluno<br>
Visão Geral: Após preencher o formulário, deve ser enviado para o orientador avaliar.
Pré-Condições: O formulário deve estar completamente preenchido.<br>
<br>
Caso de uso: Ver relatório<br>
Formato: Abstrato Completo<br>
Ator principal: Aluno e Orientador<br>
Visão Geral: Ambos atores têm acesso ao relatório preenchido pelo aluno ao preencher o formulário.<br>
Pré-Condições: O relatório deve ter sido enviado pelo aluno.<br>
<br>
Caso de uso: Analisar Relatório<br>
Formato: Resumido<br>
Ator principal: Orientador e CCP<br>
Visão Geral: O professor analisa e dá um parecer ao relatório enviado pelo aluno e o CCP verifica a avaliação e o parecer dado pelo professor e se necessário refaz a análise e parecer.<br>
<br>
Caso de uso: Enviar avaliação<br>
Formato: Resumido<br>
Ator principal: Orientador e CCP<br>
Visão Geral: Após feita a avaliação ela é enviada para o aluno.<br>
<br>
Caso de uso: Enviar notificação<br>
Formato: Resumido<br>
Ator principal: CCP<br>
Visão Geral: É enviada uma notificação para o aluno, informando a disponibilidade de consulta da avaliação.<br>
<br>
Caso de uso: Ver avaliação<br>
Formato: Resumido<br>
Ator principal: Aluno, Orientador e CCP.<br>
Visão Geral: Todos os atores têm o acesso a avaliação enviada pelo CCP, após dado o parecer da CCP em relação a avaliação do Orientador.<br>
<br>
Caso de uso: Re-enviar Formulário<br>
Formato: Resumido<br>
Ator principal: Aluno<br>
Visão Geral: Caso o aluno tenha recebido insatisfatório, ele tem acesso ao “Preencher formulário", para que possa enviar um novo.<br>
<br>
Caso de uso: Ver histórico de aluno<br>
Formato: Resumido<br>
Ator principal: CCP<br>
Visão Geral: Armazena um histórico com as avaliações finais dos alunos.<br>
<br>
Caso de uso: Desligar aluno<br>
Formato: Resumido<br>
Ator principal: CCP<br>
Visão Geral: Desliga o aluno do programa caso ele receba duas avaliações insatisfatórias.<br>
</details>

<h2 align='center'>Pré-requisitos</h2>

Para que possa rodar o projeto localmente é necessário que você possua algumas ferramentas instaladas.

O [PHP 8](https://www.php.net/releases/8.0/en.php), também é recomendado um pacote de servidores web, tal qual o [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou [WampServer](https://www.wampserver.com/en/), uma IDE ou um editor de texto capaz de identar os arquivos de modo a facilitar a leitura, tal qual o [VSCode](https://code.visualstudio.com) ou [Sublime](https://www.sublimetext.com).

<h2 align='center'>Como inicializar a aplicação</h2>

Para esta breve introdução do uso, iremos supor que você esteja utilizando o pacote de servidores  [XAMPP](https://www.apachefriends.org/pt_br/index.html).

Primeiro é necessário que você clone o repositório `gh repo clone RafaelN9/trabalhoESI`, diretamente na pasta `htdocs` encontrada dentro da pasta raiz do XAMPP.

Feito isso, abra o XAMPP, e de `Start` nos módulos `Apache` e `MySQL`.

Após isso é necessário que inicialize o banco de dados, para isso, dentro do repositório clonado, você deve encontrar o arquivo `Criação do Banco.sql`, abra o mesmo em um editor de texto, e copie todo o seu conteúdo.

Em seguida acesse o endereço `http://localhost/phpmyadmin/`, e clique no botão `SQL`, insira o conteúdo copiado na área de texto que irá aparecer, e então clique em `Executar`.

Concluída esta etapa, supondo que os processos tenham sido seguidos corretamente, e que os pré-requisitos tenha sido cumpridos, basta acessar o endereço `http://localhost/trabalhoESI/public/` e então estará no index da aplicação.

<h2 align='center'>🛠 Tecnologias utilizadas</h2>

Utilizamos as seguintes linguagens e ferramentas na construção deste projeto:

- [PHP 8](https://www.php.net)
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- [Javascript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
- [jQuery](https://jquery.com)
- [Bootstrap](https://getbootstrap.com)
- [Font Awesome](https://fontawesome.com)


