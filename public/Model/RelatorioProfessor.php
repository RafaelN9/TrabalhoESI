<?php

class RelatorioProfessor extends Relatorio
{
    private $nomeAluno;

    function __construct($nomeAluno, $codFormularioEnviado, $dataEnvioForm, $parecer, $nota)
    {
        $this->nomeAluno = $nomeAluno;
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
        $this->parecer = $parecer;
        $this->nota = $nota;
    }

    function getHead()
    {
        return ["Aluno", "Código", "Data de Envio", "Parecer", "Nota"];
    }

    function toMap($relatorio)
    {
        return [$relatorio->nomeAluno, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm, $relatorio->parecer, $relatorio->nota];
    }
}