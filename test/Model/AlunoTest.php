<?php declare(strict_types=1);

require __DIR__ . "/../../public/Model/Aluno.php";

final class AlunoTest extends PHPUnit\Framework\TestCase{

    private $aluno;

    protected function setUp(): void{
        $this->aluno = new Aluno( 123, 'joao', 'joao@gmail.com', '*******','www.test.net','mestrado',15151561610);
    }

    public function testaRetornoDoGetNomeDoAluno(): void{
        $this->assertEquals( 'joao', $this->aluno->getNome());
    }

    public function testaRetornoDoGetNumeroUSPDoAluno(): void{
        $this->assertEquals( 123 , $this->aluno->getNumero_USP());
    }

    public function testaRetornoDoGetEmailDoAluno(): void{
        $this->assertEquals( 'joao@gmail.com' , $this->aluno->getEmail());
    }

    public function testaRetornoDoGetLinkDoAluno(): void{
        $this->assertEquals( 'www.test.net' , $this->aluno->getLink_Curriculo());
    }

    public function testaRetornoDoGetCPFDoAluno(): void{
        $this->assertEquals( 15151561610 , $this->aluno->getCPF());
    }

}

?>