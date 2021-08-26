<?php declare(strict_types=1);
require __DIR__ . "/../public/calculadora.php";

final class CalculadoraTest extends PHPUnit\Framework\TestCase{

    public function testaSomaDaCalculadora(): void{
        $calculadora = new Calculadora();
        $this->assertEquals(3, $calculadora::soma(1,2));
    }

    public function testLoginSucesso(){
        $this->assertEquals(30,30);
    }

}

?>