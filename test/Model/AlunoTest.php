<?php declare(strict_types=1);

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;

require __DIR__ . "/../../public/Model/Aluno.php";

final class AlunoTest extends PHPUnit\Framework\TestCase{

    public function testaRetornoDosGetNomeDoAluno(): void{
        $aluno = new Aluno( 123, 'joao', 'joao@gmail.com', '*******','www.test.net','mestrado',15151561610);
        $this->assertEquals( 'joao', $aluno->getNome());
    }

    public function testaRetornoDosGetNumeroUSPDoAluno(): void{
        $aluno = new Aluno( 123, 'joao', 'joao@gmail.com', '*******','www.test.net','mestrado',15151561610);
        $this->assertEquals( 123 , $aluno->getNumero_USP());
    }

    public function testaRetornoDosGetEmailDoAluno(): void{
        $aluno = new Aluno( 123, 'joao', 'joao@gmail.com', '*******','www.test.net','mestrado',15151561610);
        $this->assertEquals( 'joao@gmail.com' , $aluno->getEmail());
    }

    public function testaRetornoDosGetLinkDoAluno(): void{
    
        $aluno = new Aluno( 123, 'joao', 'joao@gmail.com', '*******','www.test.net','mestrado',15151561610);

        $this->assertEquals( 'www.test.net' , $aluno->getLink_Curriculo());
    }

    public function testaRetornoDosGetCPFDoAluno(): void{
    
        $aluno = new Aluno( 123, 'joao', 'joao@gmail.com', '*******','www.test.net','mestrado', 15151561610);

        $this->assertEquals( 15151561610 , $aluno->getCPF());
    }

}

?>