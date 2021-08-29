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
}