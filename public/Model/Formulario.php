<?php
include_once 'Aluno.php';

class Formulario{
    private $aluno;
    private $codigo;
    private $questoes;

    function __construct($aluno, $q6, $q7, $q8, $q9, $q10,
            $q11, $q12, $q13, $q14, $q15, $q16, 
            $q17, $q18, $q19, $q20, $q21, $q22,
            $q23, $q24, $q25, $q26, $q27, $q28)
    {
        $this->aluno = $aluno;
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
        $this->questoes[] = $q28;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return array
     */
    public function getQuestoes(): array
    {
        return $this->questoes;
    }

    /**
     * @param array $questoes
     */
    public function setQuestoes(array $questoes): void
    {
        $this->questoes = $questoes;
    }

    /**
     * @return mixed
     */
    public function getAluno()
    {
        return $this->aluno;
    }

    /**
     * @param mixed $aluno
     */
    public function setAluno($aluno): void
    {
        $this->aluno = $aluno;
    }



}