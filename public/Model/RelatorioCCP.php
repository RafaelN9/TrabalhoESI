<?php

class RelatorioCCP extends Relatorio
{
    private $nomeAluno;
    private $nomeProfResp;

    function __construct($nomeAluno, $nomeProfResp, $codFormularioEnviado, $dataEnvioForm, $parecer, $nota)
    {
        $this->nomeAluno = $nomeAluno;
        $this->nomeProfResp = $nomeProfResp;
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
        $this->parecer = $parecer;
        $this->nota = $nota;
    }

    function getHead()
    {
        return ["Aluno", "Código", "Professor Responsável", "Data de Envio", "Parecer", "Nota"];
    }

    function toMap($relatorio)
    {
        return [$relatorio->nomeAluno, $relatorio->nomeProfResp, $relatorio->codFormularioEnviado, $relatorio->dataEnvioForm, $relatorio->parecer, $relatorio->nota];
    }
}