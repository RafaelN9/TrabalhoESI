<?php

class RelatorioAluno extends Relatorio
{

    function __construct($codFormularioEnviado, $dataEnvioForm, $parecer, $nota)
    {
        $this->codFormularioEnviado = $codFormularioEnviado;
        $this->dataEnvioForm = $dataEnvioForm;
        $this->parecer = $parecer;
        $this->nota = $nota;
    }

    function getHead()
    {
        return ["Data de Envio", "Código", "Parecer", "Nota"];
    }

    function toMap($relatorio)
    {
        return [$relatorio->codFormularioEnviado, $relatorio->dataEnvioForm, $relatorio->parecer, $relatorio->nota];
    }
}