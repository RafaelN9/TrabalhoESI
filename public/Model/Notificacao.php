<?php
class Notificacao
{
    private $codigo;
    private $usuario;
    private $texto;
    private $cor;
    private $data;
    private $link;

    public function __construct($usuario, $texto, $link, $cor)
    {
        $this->usuario = $usuario;
        $this->texto = $texto;
        $this->link = $link;
        $this->cor = $cor;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto): void
    {
        $this->texto = $texto;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link): void
    {
        $this->link = $link;
    }

    public function getCor(){
        return $this->cor;
    }

    public function getData(){
        return $this->data;
    }
}