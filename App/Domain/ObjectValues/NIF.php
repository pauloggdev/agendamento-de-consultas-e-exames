<?php
namespace App\Domain\ObjectValues;

use DomainException;

class NIF{
    
    private $nif;
    public function __construct(string $nif)
    {
        if (empty($nif) || strlen($nif) < 14) {
            throw new DomainException('nif is invalid');
        }
        $this->nif = $nif;
    }
    public function __toString()
    {
        return $this->nif;
    }
    
}