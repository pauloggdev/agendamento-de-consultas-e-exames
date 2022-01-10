<?php

namespace Tests\Unit;

use Domain\Entity\Paciente;
use Domain\ObjectValues\Endereco;
use Domain\ObjectValues\NIF;
use Domain\UseCase\Paciente\SolicitarConsultaRepository;
use Domain\UseCase\Paciente\LoadConsultaRepository;
use Domain\UseCase\Paciente\SolicitarConsulta;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';



class SolicitarConsultaTest extends TestCase
{
    /**
     * @test
     */
    public function shouldSolicitarConsulta()
    {
        $solicitarConsultaRepository = $this->createMock(SolicitarConsultaRepository::class);
        $loadConsultaRepository = $this->createMock(LoadConsultaRepository::class);
        $loadConsultaRepository->method('getConsultaByCodigo')
            ->willReturn(1);
        $paciente = new Paciente(new Endereco('A', 'Palanca', 'Luanda'), new NIF('50040030020050'), 26, 'F', 'Delfina Garcia João');
        $solicitarConsulta = new SolicitarConsulta($solicitarConsultaRepository, $loadConsultaRepository);
        $solicitarConsulta->handle(18, $paciente, '2021-12-26 23:07:00');
    }
}
