<?php

class RelatorioProfessor{
    private $nomeAluno;
    private $codFormularioEnviado;
    private $dataEnvioForm;

    function __construct($nomeAluno, $codFormularioEnviado, $dataEnvioForm){
        $this->nomeAluno = $nomeAluno;
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
    }
    function getHead(){
        return ["Nome do Aluno", "Código do Formulário Enviado", "Data de Envio do Formulário"];
    }
    function toMap($relatorio){
        return [$relatorio->nomeAluno, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm];
    }
}