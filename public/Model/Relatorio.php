<?php

abstract class Relatorio{
    private $codFormularioEnviado;
    private $dataEnvioForm;
    private $parecer;
    private $nota;

    function getHead(){}

    function toMap($relatorio){}

}

