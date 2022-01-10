<?php
namespace App\Domain\Entity;

use App\Domain\ObjectValues\Endereco;
use App\Domain\ObjectValues\NIF;

class Paciente{

    private NIF $nif;
    private Endereco $endereco;
    private $idade;
    private $sexo;
    private $nome;

    public function __construct(Endereco $endereco, NIF $nif, string $idade, string $sexo, string $nome)
    {
        $this->endereco = $endereco;
        $this->nif = $nif;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->nome = $nome;
        
    }
    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Get the value of nif
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Get the value of idade
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * Get the value of sexo
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }
}