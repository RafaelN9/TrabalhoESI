<?php declare(strict_types=1);

require __DIR__ . "/../../public/Model/Professor.php";

final class ProfessorTest extends PHPUnit\Framework\TestCase{

    private $professor;

    protected function setUp(): void{
        $this->professor = new Professor(12345678909, 'Hipo Tenusa', 'hp@hawletpacker.com', '@almostthere');
    }

    public function testaRetornoDoGetNome(){
        $this->assertEquals('Hipo Tenusa', $this->professor->getNome());
    }

    public function testaRetornoDoGetEmail(){
        $this->assertEquals('hp@hawletpacker.com', $this->professor->getEmail());
    }
    /*
    public function getSenha(){
        return $this->Senha;
    }
    */
    public function testaRetornoDoGetCPF(){
        $this->assertEquals(12345678909, $this->professor->getCPF());
    }

    public function testaValidadeDoSetNome(){
        $this->professor->setNome('Variante Delta');
        $this->assertEquals('Variante Delta', $this->professor->getNome());
    }

    public function testaValidadeDoSetEmail(){
        $this->professor->setEmail('cn@cannon.com');
        $this->assertEquals('cn@cannon.com', $this->professor->getEmail());
    }
    /*
    public function setSenha($Senha){
        $this->Senha = $Senha;
    }
    */
    public function testaValidadeDoSetCPF(){
        $cpf = 19876543210;
        $this->professor->setCPF($cpf);
        $this->assertEquals($cpf, $this->professor->getCPF());
    }


}

?>