<?php
namespace Domain\Entity;

class Paciente extends User{

    private $endereco;
    private $nif;
    private $idade;
    private $sexo;
    private $nome;

    public function __construct(string $endereco, string $nif, string $idade, string $sexo, string $nome)
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