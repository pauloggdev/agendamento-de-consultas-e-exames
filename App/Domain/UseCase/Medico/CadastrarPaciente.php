<?php

namespace App\Domain\UseCase\Medico;

use App\Domain\Entity\Paciente;

class CadastrarPaciente
{


    private CadastrarPacienteRepository $cadastrarPacienteRepository;
    public function __construct(CadastrarPacienteRepository $cadastrarPacienteRepository)
    {
        $this->cadastrarPacienteRepository = $cadastrarPacienteRepository;
    }


    public function handler(Paciente $paciente)
    {
        $paciente = $this->cadastrarPacienteRepository->cadastrarPaciente($paciente);
        return $paciente;
    }
}
