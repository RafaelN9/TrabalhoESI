<?php declare(strict_types=1);

require __DIR__ . "/../../public/Model/Relatorio.php";

final class RelatorioTest extends PHPUnit\Framework\TestCase{

    private $relatorio;

    protected function setUp(): void{
        $this->relatorio = new RelatorioProfessor('Somebody Once Told Me', 'UBUNTU16', '11/11/2011');
    }

    function testaRetornoDoGetHead(){
        $this->assertEquals(["Nome do Aluno", "Código do Formulário Enviado", "Data de Envio do Formulário"], $this->relatorio->getHead());
    }

    function testaValidadeDoMetodoToMap(){
        $this->assertNotNull($this->relatorio->toMap($this->relatorio));
    }

}

?>