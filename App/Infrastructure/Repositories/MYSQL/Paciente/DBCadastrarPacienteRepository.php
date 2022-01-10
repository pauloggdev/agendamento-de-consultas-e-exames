<?php
namespace App\Infrastructure\Repositories\MYSQL\Paciente;

use App\Domain\Entity\Paciente;
use App\Domain\UseCase\Medico\CadastrarPacienteRepository;
use Exception;

class DBCadastrarPacienteRepository implements CadastrarPacienteRepository{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function cadastrarPaciente(Paciente $paciente)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pacientes (nome, nif, idade, sexo, rua, bairro, cidade) VALUES(?,?,?,?,?,?,?)");
        try {
            $this->pdo->beginTransaction();
            $stmt->execute(array($paciente->getNome(), 
            $paciente->getNif(), 
            $paciente->getIdade(), 
            $paciente->getSexo(), 
            $paciente->getEndereco()->getRua(),
            $paciente->getEndereco()->getBairro(),
            $paciente->getEndereco()->getCidade()
        ));
            $this->pdo->commit();
            return  $this->pdo->lastInsertId();
        } catch (Exception $e) {
            $this->pdo->rollback();
            return $e->getMessage();
        }
        
    }
    
}