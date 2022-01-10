<?php
namespace App\Domain\UseCase\Paciente;


interface CancelarConsultaRepository{
    public function CancelarConsulta(int $codigoConsulta, int $pacienteId):int;
}