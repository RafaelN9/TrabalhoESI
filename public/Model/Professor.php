<?php

class Aluno{
    private $Nome;
    private $Email;
    private $Senha;
    private $CPF;

    function __construct($nome, $email, $senha, $cpf) {
        $this->Nome = $nome;
        $this->Email = $email;
        $this->Senha = $senha;
        $this->CPF = $cpf;
    }

}
