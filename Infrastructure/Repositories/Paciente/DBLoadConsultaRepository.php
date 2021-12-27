<?php

namespace Infrastructure\Repositories\Paciente;

use Domain\Entity\Consulta;
use Domain\UseCase\Paciente\loadConsultaRepository;
use Exception;

class DBLoadConsultaRepository implements LoadConsultaRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getConsultaByCodigo($codigoConsulta): int
    {
        $stmt = $this->pdo->prepare("SELECT *FROM consultas WHERE id=?");
        $stmt->execute(array($codigoConsulta));
        $consulta = $stmt->fetch();

        if($consulta) return $consulta['id'];

        return 0;
    }
}
