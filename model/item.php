<?php

class item implements JsonSerializable
{
    private $id;
    private $titulo;
    private $descricao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'titulo' => $this->getTitulo(),
            'descricao' => $this->getDescricao()
        ];
    }
}
