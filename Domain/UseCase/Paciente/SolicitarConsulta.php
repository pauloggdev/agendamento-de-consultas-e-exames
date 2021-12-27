<?php
namespace Domain\UseCase\Paciente;
use Domain\Entity\Consulta;
use Domain\Entity\Paciente;
use ErrorException;
use Exception;

class SolicitarConsulta
{
    private $solicitarConsultaRepository;
    private $loadConsultaRepository;

    public function __construct(
        SolicitarConsultaRepository $solicitarConsultaRepository,
        LoadConsultaRepository $loadConsultaRepository
    )
    {
        $this->solicitarConsultaRepository = $solicitarConsultaRepository;
        $this->loadConsultaRepository = $loadConsultaRepository;
    }
    public function handle(string $codigoConsulta, Paciente $paciente, $data_agenda):int
    {
        if($this->loadConsultaRepository->getConsultaByCodigo($codigoConsulta)){
            $consulta = $this->solicitarConsultaRepository->solicitarConsulta($codigoConsulta, $paciente, $data_agenda);
            return $consulta;
        }else{
            throw new ErrorException('Exame não encontrado');
        }  
        return 1;
    }
}
