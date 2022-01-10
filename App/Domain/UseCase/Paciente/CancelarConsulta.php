<?php
namespace App\Domain\UseCase\Paciente;

use ErrorException;

class CancelarConsulta
{
    private CancelarConsultaRepository $cancelarConsultaRepository;
    private LoadConsultaRepository $loadConsultaRepository;
    public function __construct(
        CancelarConsultaRepository $cancelarConsultaRepository,
        LoadConsultaRepository $loadConsultaRepository
    )
    {
        $this->cancelarConsultaRepository = $cancelarConsultaRepository;
        $this->loadConsultaRepository = $loadConsultaRepository;
    }
    public function handle($codigoConsulta, $pacienteId)
    {
        if($this->loadConsultaRepository->getConsultaByCodigo($codigoConsulta)){
            $consulta = $this->cancelarConsultaRepository->CancelarConsulta($codigoConsulta, $pacienteId);
            return $consulta;
        }else{
            throw new ErrorException('Exame não encontrado');
        }  
    }
}
