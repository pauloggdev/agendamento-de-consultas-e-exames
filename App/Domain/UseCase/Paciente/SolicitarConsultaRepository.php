<?php
namespace App\Domain\UseCase\Paciente;

use App\Domain\Entity\Paciente;

interface SolicitarConsultaRepository{
    public function solicitarConsulta(int $codigoConsulta, Paciente $paciente, $data_agenda):int;
}