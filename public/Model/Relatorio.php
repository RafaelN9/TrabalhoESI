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
        return ["Aluno", "Código", "Data de Envio"];
    }
    function toMap($relatorio){
        return [$relatorio->nomeAluno, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm];
    }
}

class RelatorioAluno{
    private $codFormularioEnviado;
    private $dataEnvioForm;

    function __construct($codFormularioEnviado, $dataEnvioForm){
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
    }
    function getHead(){
        return ["Código", "Data de Envio"];
    }
    function toMap($relatorio){
        return [$relatorio->nomeAluno, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm];
    }
}

class RelatorioCCP{
    private $nomeAluno;
    private $nomeProfResp;
    private $codFormularioEnviado;
    private $dataEnvioForm;

    function __construct($nomeAluno, $nomeProfResp, $codFormularioEnviado, $dataEnvioForm){
        $this->nomeAluno = $nomeAluno;
        $this->nomeProfResp = $nomeProfResp;
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
    }
    function getHead(){
        return ["Aluno", "Professor Responsável", "Código", "Data de Envio"];
    }
    function toMap($relatorio){
        return [$relatorio->nomeAluno, $relatorio->nomeProfResp, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm];
    }
}