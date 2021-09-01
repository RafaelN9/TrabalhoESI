<?php

class RelatorioProfessor{
    private $nomeAluno;
    private $codFormularioEnviado;
    private $dataEnvioForm;
    private $parecer;
    private $nota;

    function __construct($nomeAluno, $codFormularioEnviado, $dataEnvioForm, $parecer, $nota){
        $this->nomeAluno = $nomeAluno;
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
        $this->parecer = $parecer;
        $this->nota = $nota;
    }
    function getHead(){
        return ["Aluno", "Código", "Data de Envio", "Parecer", "Nota"];
    }
    function toMap($relatorio){
        return [$relatorio->nomeAluno, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm, $relatorio->parecer, $relatorio->nota];
    }
}

class RelatorioAluno{
    private $codFormularioEnviado;
    private $dataEnvioForm;
    private $parecer;
    private $nota;

    function __construct($codFormularioEnviado, $dataEnvioForm, $parecer, $nota){
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
        $this->parecer = $parecer;
        $this->nota = $nota;
    }
    function getHead(){
        return ["Código", "Data de Envio", "Parecer", "Nota"];
    }
    function toMap($relatorio){
        return [$relatorio->codFormularioEnviado, $relatorio->dataEnvioForm, $relatorio->parecer, $relatorio->nota];
    }
}

class RelatorioCCP{
    private $nomeAluno;
    private $nomeProfResp;
    private $codFormularioEnviado;
    private $dataEnvioForm;
    private $parecer;
    private $nota;

    function __construct($nomeAluno, $nomeProfResp, $codFormularioEnviado, $dataEnvioForm, $parecer, $nota){
        $this->nomeAluno = $nomeAluno;
        $this->nomeProfResp = $nomeProfResp;
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
        $this->parecer = $parecer;
        $this->nota = $nota;
    }
    function getHead(){
        return ["Aluno", "Professor Responsável", "Código", "Data de Envio", "Parecer", "Nota"];
    }
    function toMap($relatorio){
        return [$relatorio->nomeAluno, $relatorio->nomeProfResp, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm, $relatorio->parecer, $relatorio->nota];
    }
}