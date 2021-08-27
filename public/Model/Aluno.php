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

    public function getNumero_USP(){
        return $this->Numero_USP;
    }

    public function getNome(){
        return $this->Nome;
    }

    public function getEmail(){
        return $this->Email;
    }

    public function getSenha(){
        return $this->Senha;
    }

    public function getLink_Curriculo(){
        return $this->Link_Curriculo;
    }

    public function getCod_Curso(){
        return $this->Cod_Curso;
    }

    public function getCPF(){
        return $this->CPF;
    }
}
