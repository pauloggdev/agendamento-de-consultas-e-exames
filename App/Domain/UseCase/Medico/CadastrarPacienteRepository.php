<?php
namespace App\Domain\UseCase\Medico;

use App\Domain\Entity\Paciente;

interface CadastrarPacienteRepository{
    public function cadastrarPaciente(Paciente $paciente);
}