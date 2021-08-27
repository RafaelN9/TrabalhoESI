<?php
require_once 'Model/Aluno.php';

class PessoaController {

 public function listar() {
    $aluno = new Aluno("123", 'joao', 'joao@gmail.com', '13','link','mestrado','1515156161');
    $alunos[] = $aluno;

    $aluno = new Aluno("312", 'carlos', 'joao@gmail.com', '13','link','mestrado','1515156161');
    $alunos[] = $aluno;


 $_REQUEST['alunos'] = $alunos;

 require_once 'View/listarAlunos.php';
 }
}

?>