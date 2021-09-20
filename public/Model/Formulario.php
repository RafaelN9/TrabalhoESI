<?php
include_once 'Aluno.php';

class Formulario{
    private $codigo_aluno;
    private $data_envio;
    private $professor_resp;
    private $questoes;
    private $codigo;

    function __construct($codigo_aluno, $data_envio, $q6, $q7, $q8, $q9, $q10,
            $q11, $q12, $q13, $q14, $q15, $q16, 
            $q17, $q18, $q19, $q20, $q21, $q22,
            $q23, $q24, $q25, $q26, $q27, $professor_resp = '')
    {
        $this->codigo_aluno = $codigo_aluno;
        $this->data_envio = $data_envio;
        $this->questoes[] = $q6;
        $this->questoes[] = $q7;
        $this->questoes[] = $q8;
        $this->questoes[] = $q9;
        $this->questoes[] = $q10;
        $this->questoes[] = $q11;
        $this->questoes[] = $q12;
        $this->questoes[] = $q13;
        $this->questoes[] = $q14;
        $this->questoes[] = $q15;
        $this->questoes[] = $q16;
        $this->questoes[] = $q17;
        $this->questoes[] = $q18;
        $this->questoes[] = $q19;
        $this->questoes[] = $q20;
        $this->questoes[] = $q21;
        $this->questoes[] = $q22;
        $this->questoes[] = $q23;
        $this->questoes[] = $q24;
        $this->questoes[] = $q25;
        $this->questoes[] = $q26;
        $this->questoes[] = $q27;
        $this->professor_resp = $professor_resp;
    }

    public function getCodigoAluno(){ return $this->codigo_aluno;}

    public function setCodigoAluno($codigo_aluno): void{ $this->codigo_aluno = $codigo_aluno;}

    public function getQuestoes(): array{ return $this->questoes;}

    public function setQuestoes(array $questoes): void{ $this->questoes = $questoes;}

    public function getDataEnvio(){ return $this->data_envio;}

    public function setDataEnvio($dataEnvio): void{ $this->data_envio = $dataEnvio;}

    public function getProfessorResp(){return $this->professor_resp;}

    public function getCodigo(){return $this->codigo;}

    public function setCodigo($codigo): void{ $this->codigo = $codigo;}

}