<?php
namespace App\Domain\UseCase\Paciente;
interface LoadConsultaRepository{
    public function getConsultaByCodigo(int $codigoConsulta):int;
}