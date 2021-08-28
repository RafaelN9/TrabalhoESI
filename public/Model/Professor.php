<?php

class Professor{
    private $Nome;
    private $Email;
    private $Senha;
    private $CPF;

    function __construct($cpf, $nome, $email, $senha) {
        $this->Nome = $nome;
        $this->Email = $email;
        $this->Senha = $senha;
        $this->CPF = $cpf;
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

    public function getCPF(){
        return $this->CPF;
    }

    public function setNome($Nome){
        $this->Nome = $Nome;
    }

    public function setEmail($Email){
        $this->Email = $Email;
    }

    public function setSenha($Senha){
        $this->Senha = $Senha;
    }

    public function setCPF($CPF){
        $this->CPF = $CPF;
    }
}
