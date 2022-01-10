<?php
namespace App\Domain\UseCase\Paciente;

use App\Domain\Entity\Paciente;
use ErrorException;

class SolicitarConsulta
{
    private SolicitarConsultaRepository $solicitarConsultaRepository;
    private LoadConsultaRepository $loadConsultaRepository;

    public function __construct(
        SolicitarConsultaRepository $solicitarConsultaRepository,
        LoadConsultaRepository $loadConsultaRepository
    )
    {
        $this->solicitarConsultaRepository = $solicitarConsultaRepository;
        $this->loadConsultaRepository = $loadConsultaRepository;
    }
    public function handle(string $codigoConsulta, Paciente $paciente, $data_agenda):bool
    {
        if($this->loadConsultaRepository->getConsultaByCodigo($codigoConsulta)){
            $consulta = $this->solicitarConsultaRepository->solicitarConsulta($codigoConsulta, $paciente, $data_agenda);
            return $consulta;
        }else{
            throw new ErrorException('Exame não encontrado');
        }  
    }
}
