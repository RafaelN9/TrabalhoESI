<?php

class Aluno{
    private $Numero_USP;
    private $Nome;
    private $Email;
    private $Senha;
    private $Link_Curriculo;
    private $Cod_Curso;
    private $CPF;

    function __construct($nUSP, $nome, $email, $senha, $link, $Cod_Curso, $cpf) {
        $this->Numero_USP = $nUSP;
        $this->Nome = $nome;
        $this->Email = $email;
        $this->Senha = $senha;
        $this->Link_Curriculo = $link;
        $this->Cod_Curso = $Cod_Curso;
        $this->CPF = $cpf;
    }

    public function imprime(){
        echo $this->Numero_USP.'<br>';
        echo $this->Nome.'<br>';
        echo $this->Email.'<br>';
        echo $this->Senha.'<br>';
        echo $this->Link_Curriculo.'<br>';
        echo $this->Cod_Curso.'<br>';
        echo $this->CPF.'<br>';
    }

    public function getNumero_USP(){
        return $this->Numero_USP;
    }

    public function getNome(){
        return $this->Nome;
    }
}
