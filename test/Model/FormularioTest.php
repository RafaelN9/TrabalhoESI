<?php declare(strict_types=1);

require __DIR__ . "/../../public/Model/Formulario.php";


final class FormularioTest extends PHPUnit\Framework\TestCase{

    private $formulario;

    function setUp(): void{
        $this->formulario = new Formulario(
            $this->createMock(Aluno::class),
            '1', '1', '1', '1', '1', '1', '1', 
            '1', '1', '1', '1', '1', '1', '1',
            '1', '1', '1', '1', '1', '1', '1',
            '1', '1');
    }

    public function testaGetAluno(){
        $this->assertNotNull($this->formulario->getAluno());
    }
    
    public function testaSetAluno(){
        $this->formulario->setAluno(['Jonas', 'Brothers']);
        $this->assertEquals(['Jonas', 'Brothers'], $this->formulario->getAluno());
    }

    public function testaGetCodigo(){
        $this->formulario->setCodigo('foobar');
        $this->assertNotEmpty($this->formulario->getAluno());
    }
    
    public function testaSetCodigo(){
        $this->formulario->setCodigo('barfoo');
        $this->assertEquals('barfoo',$this->formulario->getCodigo());
    }
    
    public function testaGetQuestoes(){
        $this->assertNotNull($this->formulario->getQuestoes());
    }
    
    public function testaSetQuestoes(){
        $this->formulario->setQuestoes([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $this->formulario->getQuestoes());
    }


}

?>