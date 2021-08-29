<?php

class Form{
    private $codigo;
    private $questoes;

    function __construct($codigo, $q1, $q2, $q3,
            $q4, $q5, $q6, $q7, $q8, $q9, $q10, 
            $q11, $q12, $q13, $q14, $q15, $q16, 
            $q17, $q18, $q19, $q20, $q21, $q22)
    {
        $this->questoes[] = $q1;
        $this->questoes[] = $q2;
        $this->questoes[] = $q3;
        $this->questoes[] = $q4;
        $this->questoes[] = $q5;
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
        $this->codigo = $codigo;
    }
}