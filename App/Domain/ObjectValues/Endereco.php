<?php
namespace App\Domain\ObjectValues;

class Endereco{

    private $rua;
    private $bairro;
    private $cidade;

    public function __construct(string $rua, string $bairro, string $cidade)
    {
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
    }
    /**
     * Get the value of rua
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }
}