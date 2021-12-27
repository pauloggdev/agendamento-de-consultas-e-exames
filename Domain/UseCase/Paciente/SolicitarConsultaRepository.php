<?php
namespace Domain\UseCase\Paciente;
use Domain\Entity\Paciente;

interface SolicitarConsultaRepository{
    public function solicitarConsulta(int $codigoConsulta, Paciente $paciente, $data_agenda):int;
}