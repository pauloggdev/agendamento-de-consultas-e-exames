<?php

namespace App\Infrastructure\Repositories\MYSQL\Paciente;

use App\Domain\ObjectValues\StatuConsulta;
use App\Domain\UseCase\Paciente\CancelarConsultaRepository;
use Exception;

class DBCancelarConsultaRepository implements CancelarConsultaRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function cancelarConsulta(int $codigoConsulta, int $pacienteId): int
    {

        $stmt = $this->pdo->prepare("UPDATE consulta_solicitadas SET statuConsultaId=? WHERE consulta_id=? AND paciente_id=?");
        try {
            $this->pdo->beginTransaction();
            $stmt->execute(array(StatuConsulta::CANCELLED, $codigoConsulta, $pacienteId));
            $this->pdo->commit();
            return   $stmt->rowCount();
        } catch (Exception $e) {
            $this->pdo->rollback();
        }
        return 0;
    }
}
